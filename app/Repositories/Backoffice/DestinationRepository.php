<?php

namespace App\Repositories\Backoffice;
use App\Domain\Interfaces\Repositories\Backoffice\IDestinationRepository;

use App\Logic\ImageUploader as UploadLogic;
use App\Models\Backoffice\Destination as Model;
use App\Models\Backoffice\DestinationImage;
use DB, Str;

class DestinationRepository extends Model implements IDestinationRepository
{

    public function fetch(){
        return $this->all();
    }

    public function saveData($request){
        DB::beginTransaction();
        try {
            $data = $this->find($request->id)?:new self;
            $data->name = $request->name;
            $data->details = $request->details;

            $data->save();
            if($request->hasFile('thumbnail')){

                $this->deleteDestinationImg($data->id);

                $dataImage = new DestinationImage;
                
                $dataImage->destination_id = $data->id;
                $dataImage->is_thumb = true;

                $upload = UploadLogic::upload($request->thumbnail,'storage/destination');
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

    public function deleteDestinationImg($id){
        $prodImgs = DestinationImage::where('destination_id',$id)->get();
        foreach($prodImgs as $index => $prodImg){
            $prodImg->delete();
        }
    }

    public function deleteData($id){
        DB::beginTransaction();
        try {
            $prodImgs = DestinationImage::where('destination_id',$id)->get();
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
}
