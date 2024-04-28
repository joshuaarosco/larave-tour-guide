<?php

namespace App\Repositories\Backoffice;
use App\Domain\Interfaces\Repositories\Backoffice\IRegisterRepository;

use App\Events\SendEmailEvent;
use App\Logic\ImageUploader as UploadLogic;
use App\Models\User as Model;
use App\Models\Backoffice\Member;
use DB, Str;

class RegisterRepository extends Model implements IRegisterRepository
{

    public function fetch($id){
        return $this->find($id);
    }

    public function saveData($request){
        DB::beginTransaction();
        try {
            $user = User::find($request->user_id);
            $participant = $user? $this->where('user_id', $user->id)->first() : null;
            
            $password = Str::random(8);

            if($request->has('password')){
                $password = $request->password;
            }
            
            //set and save password if theres no user fetch
            if(!$user){
                $user = new User;
                $user->password = bcrypt($password);
            }

            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->username = $request->email;
            $user->type = $request->type;
            $user->email = $request->email;
            $user->contact_number = $request->contact_number;

            $user->save();

            $data = new Member;

            $data->user_id = $user->id;

            if($request->hasFile('bc')){
                $upload = UploadLogic::upload($request->bc,'storage/bc');
                $data->bc_path = $upload["path"];
                $data->bc_directory = $upload["directory"];
                $data->bc_filename = $upload["filename"];
            }

            event(new SendEmailEvent($data,'admin_notif'));

            $data->save();

            DB::commit();

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
}
