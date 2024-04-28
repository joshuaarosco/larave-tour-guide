<?php

namespace App\Repositories\Backoffice;
use App\Domain\Interfaces\Repositories\Backoffice\IBookRepository;

use App\Logic\ImageUploader as UploadLogic;
use App\Models\Backoffice\Booking as Model;
use App\Models\Backoffice\Tour;
use DB, Str;

class BookRepository extends Model implements IBookRepository
{

    public function fetch(){
        return $this->orderBy('date', 'DESC')->get();
    }

    public function fetchMyBookings(){
        if(auth()->check())
            return $this->where('user_id', auth()->user()->id)->orderBy('date', 'DESC')->get();
        return abort(404);
    }

    public function saveData($request){
        DB::beginTransaction();
        try {
            $data = $this->find($request->id)?:new self;
            $data->tour_id = $request->tour_id;
            $data->user_id = $request->user_id;
            $data->fname = $request->fname;
            $data->lname = $request->lname;
            $data->email = $request->email;
            $data->contact_number = $request->contact_number;
            $data->date = $request->date;
            $data->additional = $request->additional;

            $data->save();

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

    public function myBookings(){
        $tours = Tour::where('user_id', auth()->user()->id)->pluck('id');

        return $this->whereIn('tour_id', $tours)->orderBy('date', 'DESC')->where('status','!=', 'Completed')->get();
    }

    public function updateBooking($request, $id){
        DB::beginTransaction();
        try {
            $booking = self::find($id);
            $booking->date = $request->date;
            $booking->start = date('Y-m-d H:i:s',strtotime($request->start));
            $booking->end = date('Y-m-d H:i:s',strtotime($request->end));
            $booking->status = $request->status;

            $booking->save();

            DB::commit();

            return $booking;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }
}
