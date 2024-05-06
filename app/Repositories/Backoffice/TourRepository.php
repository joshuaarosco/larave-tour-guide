<?php

namespace App\Repositories\Backoffice;
use App\Domain\Interfaces\Repositories\Backoffice\ITourRepository;

use App\Logic\ImageUploader as UploadLogic;
use App\Models\Backoffice\Tour as Model;
use App\Models\User;
use App\Models\Backoffice\TourImage;
use App\Models\Backoffice\TourGallery;
use DB, Str;

class TourRepository extends Model implements ITourRepository
{

    public function fetch(){
        $today = date('Y-m-d');
        $tourGuides = User::where('type', 'tour_guide')->whereDate('validity_date','>=',date('Y-m-d'))->pluck('id');
        if(auth()->check() AND in_array(auth()->user()->type, ['tour_guide'])){
            return $this->where('user_id', auth()->user()->id)->get();
        }

        return $this->whereIn('user_id', $tourGuides)->get();
    }

    public function saveData($request){
        DB::beginTransaction();
        try {
            $data = $this->find($request->id)?:new self;
            $data->user_id = auth()->user()->id;
            $data->destination_id = $request->destination_id;
            $data->name = $request->name;
            $data->details = $request->details;
            $data->activities = $request->activities;
            $data->price = $request->price;

            $data->save();

            if($request->hasFile('thumbnail')){

                $this->deleteTourImg($data->id);

                $dataImage = new TourImage;
                
                $dataImage->tour_id = $data->id;
                $dataImage->is_thumb = true;

                $upload = UploadLogic::upload($request->thumbnail,'storage/tour');
                $dataImage->path = $upload["path"];
                $dataImage->directory = $upload["directory"];
                $dataImage->filename = $upload["filename"];
                
                $dataImage->save();
            }

            DB::commit();

            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function findOrFail($id){
        return $this->find($id);
    }

    public function deleteTourImg($id){
        $prodImgs = TourImage::where('tour_id',$id)->get();
        foreach($prodImgs as $index => $prodImg){
            $prodImg->delete();
        }
    }

    public function deleteData($id){
        DB::beginTransaction();
        try {
            $prodImgs = TourImage::where('tour_id',$id)->get();
            foreach($prodImgs as $index => $prodImg){
                $prodImg->delete();
            }
            $this->destroy($id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function upload($request){
        DB::beginTransaction();
        try {
            $data = $this->findOrFail($request->id);
            if($request->hasFile('pic')){
                foreach($request->pic as $index => $pic){
                    $dataImage = new TourGallery;
                    $dataImage->tour_id = $request->id;

                    $upload = UploadLogic::upload($pic,'storage/tour_gallery');
                    $dataImage->path = $upload["path"];
                    $dataImage->directory = $upload["directory"];
                    $dataImage->filename = $upload["filename"];
                    
                    $dataImage->save();
                }
            }

            DB::commit();

            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function deletePic($id, $picId){
        DB::beginTransaction();
        try {
            $picToDelete = TourGallery::where('tour_id', $id)->where('id', $picId)->first()->delete();

            DB::commit();
            return $picToDelete;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }
}
