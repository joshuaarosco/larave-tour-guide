<?php

namespace App\Repositories\Backoffice;
use App\Domain\Interfaces\Repositories\Backoffice\ITourGuideRepository;

use App\Events\SendEmailEvent;
use App\Logic\ImageUploader as UploadLogic;
use App\Models\User as Model;
use App\Models\Backoffice\TourGuide;
use DB, Str;

class TourGuideRepository extends Model implements ITourGuideRepository
{

    public function fetch(){
        return TourGuide::all();
    }

    public function fetchFeatured(){
        return TourGuide::where('is_featured', true)->get();
    }

    public function saveData($request){
        DB::beginTransaction();
        try {
            $user = self::find($request->user_id);
            $tour_guide = $user? $this->where('user_id', $user->id)->first() : null;
            
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

            $tour_guide = new TourGuide;

            $tour_guide->user_id = $user->id;
            $tour_guide->intro = $request->intro;
            $tour_guide->nickname = $request->nickname;

            if($request->hasFile('file')){
                $upload = UploadLogic::upload($request->bc,'storage/tour_guide');
                $tour_guide->path = $upload["path"];
                $tour_guide->directory = $upload["directory"];
                $tour_guide->filename = $upload["filename"];
            }

            $tour_guide->save();

            DB::commit();

            return $tour_guide;
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

    public function findTourGuide($id){
        return TourGuide::find($id);
    }

    public function fetchTourGuides($tourGuideIds){
        return self::whereIn('id', $tourGuideIds)->get();
    }
}
