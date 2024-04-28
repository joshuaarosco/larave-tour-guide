<?php

namespace App\Repositories\Backoffice;
use App\Domain\Interfaces\Repositories\Backoffice\IMessageRepository;

use App\Events\SendEmailEvent;

use App\Logic\ImageUploader as UploadLogic;
use App\Models\Backoffice\Message as Model;
use App\Models\Backoffice\MessageThread;
use DB, Str, Collection;

class MessageRepository extends Model implements IMessageRepository
{
    public function fetch(){
        if(auth()->user()->type == 'tourist')
            return self::where('tourist_id', auth()->user()->id)->orderBy('updated_at','DESC')->get();
        return self::where('tour_guide_id', auth()->user()->id)->orderBy('updated_at','DESC')->get();
    }

    public function createMessage($id){
        DB::beginTransaction();
        try {
            $message = self::where('tour_guide_id', $id)->where('tourist_id', auth()->user()->id)->first();
            if(!$message){
                $message = new self;
                $message->tour_guide_id = $id;
                $message->tourist_id = auth()->user()->id;
                $message->save();
            }

            DB::commit();
            return $message;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function fetchCurrentMessages(){
        return $this->whereIn('loan_status',['pending','approved'])->orderBy('updated_at', 'DESC')->get();
    }

    public function sendMessage($request, $id){
        DB::beginTransaction();
        try {
            $thread = new  MessageThread;
            $thread->message = $request->message;
            $thread->sender_id = auth()->user()->id;
            $thread->thread_id = $id;
            $thread->save();

            $message = self::find($id);
            $message->updated_at = $thread->updated_at;
            $message->save();

            DB::commit();

            return $thread;
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
}
