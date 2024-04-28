<?php

namespace App\Repositories\Backoffice;
use App\Domain\Interfaces\Repositories\Backoffice\ITouristRepository;

use App\Events\SendEmailEvent;
use App\Logic\ImageUploader as UploadLogic;
use App\Models\User as Model;
use App\Models\Backoffice\Tourist;
use DB, Str;

class TouristRepository extends Model implements ITouristRepository
{

    public function fetch($id){
        return $this->find($id);
    }

    public function saveData($request){
        DB::beginTransaction();
        try {
            $user = self::find($request->user_id);
            $tourist = $user? $this->where('user_id', $user->id)->first() : null;
            
            $password = Str::random(8);

            if($request->has('password')){
                $password = $request->password;
            }
            
            //set and save password if theres no user fetch
            if(!$user){
                $user = new self;
                $user->password = bcrypt($password);
            }

            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->username = $request->email;
            $user->type = $request->type;
            $user->email = $request->email;
            $user->contact_number = $request->contact_number;

            $user->save();

            $tourist = new Tourist;

            $tourist->user_id = $user->id;

            if($request->hasFile('file')){
                $upload = UploadLogic::upload($request->bc,'storage/tourist');
                $tourist->path = $upload["path"];
                $tourist->directory = $upload["directory"];
                $tourist->filename = $upload["filename"];
            }

            $tourist->save();

            DB::commit();

            return $tourist;
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
}
