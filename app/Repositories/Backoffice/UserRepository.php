<?php

namespace App\Repositories\Backoffice;
use App\Domain\Interfaces\Repositories\Backoffice\IUserRepository;

use App\Logic\ImageUploader as UploadLogic;
use App\Models\User as Model;
use App\Models\Backoffice\TourGuide;
use DB, Str;

class UserRepository extends Model implements IUserRepository
{

    public function fetch(){
        return $this->where('type','!=','super_user')->whereNotIn('type',['tour_guide','tourist'])->get();
    }

    public function fetchTourGuides(){
        return $this->where('type','!=','super_user')->where('type','=','tour_guide')->get();
    }

    public function fetchTourist(){
        return $this->where('type','!=','super_user')->where('type','=','tourist')->get();
    }

    public function activeMembers(){
        return Member::where('active', 1)->count();
    }

    public function inactiveMembers(){
        return Member::where('active', 0)->count();
    }

    public function saveData($request){
        DB::beginTransaction();
        try {
            $data = $this->find($request->id);

            $password = Str::random(8);
            if(!$data){
                $data = new self;
                $data->password = bcrypt($password);
            }

            $data->fname = $request->fname;
            // $data->mname = $request->mname;
            $data->lname = $request->lname;
            $data->username = $request->email;
            $data->type = $request->type;
            $data->email = $request->email;
            $data->contact_number = $request->contact_number;
            
            $data->save();

            DB::commit();

            $data->password = $password;
            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function findOrFail($id){
        $data = $this->find($id);
        if(!$data){
            return false;
        }
        return $data;
    }

    public function deleteData($id){
        DB::beginTransaction();
        try {
            $this->destroy($id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function findOrFailMember($id){
        $data = $this->find($id);
        if(!$data){
            return false;
        }
        $member = [
            'id' => $data->id,
            'email' => $data->email,
            'fname' => $data->fname,
            'mname' => $data->mname,
            'lname' => $data->lname,
            'contact_number' => $data->contact_number, 
        ];
        return $member;
    }

    public function isFeatured($id){
        DB::beginTransaction();
        try {
            $tourGuide = TourGuide::find($id);
            $tourGuide->is_featured = $tourGuide->is_featured?false:true;
            $tourGuide->save();
            DB::commit();
            return $tourGuide;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }
}
