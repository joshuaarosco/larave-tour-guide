<?php

namespace App\Repositories\Backoffice;
use App\Domain\Interfaces\Repositories\Backoffice\IAccountRepository;

use App\Logic\ImageUploader as UploadLogic;
use App\Models\User as Model;
use App\Models\Backoffice\TourGuide;
use App\Models\Backoffice\Subscription;
use DB, Str;

class AccountRepository extends Model implements IAccountRepository
{

    public function fetch($id){
        return $this->find($id);
    }

    public function saveData($request){
        DB::beginTransaction();
        try {
            $user = $this->find(auth()->user()->id);
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->lname = $request->lname;
            $user->username = $request->email;
            $user->email = $request->email;
            $user->contact_number = $request->contact_number;

            if($request->hasFile('file')){
                $upload = UploadLogic::upload($request->file,'storage/user');
                $user->path = $upload["path"];
                $user->directory = $upload["directory"];
                $user->filename = $upload["filename"];
            }

            if($request->has('intro')){
                $tour_guide = TourGuide::find(auth()->user()->tourGuide->id); 
                $tour_guide->intro = $request->intro;
                $tour_guide->save();
            }

            $user->save();

            DB::commit();

            return $user;
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

    public function subscribe($request){
        DB::beginTransaction();
        try {
            $user = $this->find(auth()->user()->id);

            $newSub = new Subscription;
            $newSub->user_id = auth()->user()->id;
            if($request->hasFile('file')){
                $upload = UploadLogic::upload($request->file,'storage/subscription');
                $newSub->path = $upload["path"];
                $newSub->directory = $upload["directory"];
                $newSub->filename = $upload["filename"];
            }

            $newSub->save();

            return $user;

            DB::commit();

            return $user;
        } catch (\Exception $e) {
             DB::rollback();
             return false;
        }
    }

    public function subs(){
        $users = $this->where('type', 'tour_guide')->get();

        return $users;
    }

    public function updateSub($request){
        $user = self::where('id',$request->id)->first();
        $user->validity_date = $request->get('validity-date');
        $user->save();

        return true;
    }
}
