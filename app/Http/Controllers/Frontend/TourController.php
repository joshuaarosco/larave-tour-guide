<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;

//Repositories
use App\Domain\Interfaces\Repositories\Backoffice\ITourRepository;
use App\Domain\Interfaces\Repositories\Backoffice\IBookRepository;

//Request Validation
use App\Http\Requests\Frontend\BookRequest;

class TourController extends Controller
{
    public function __construct(ITourRepository $tourRepo, IBookRepository $bookRepo){
        $this->data = [];
        $this->tourRepo = $tourRepo;
        $this->bookRepo = $bookRepo;
        $this->data['toursSide'] = $tourRepo->orderBy('created_at', 'DESC')->paginate(3);
    }

    public function index(){
        $this->data['tours'] = $this->tourRepo->fetch();
        return view('frontend.web._pages.tour.index',$this->data);
    }

    public function detail($id){
        $this->data['tour'] = $this->tourRepo->findOrFail($id);
        if(!$this->data['tour']){
            return abort(404);
        }
        return view('frontend.web._pages.tour.view',$this->data);
    }

    public function book($id){
        $this->data['tour'] = $this->tourRepo->findOrFail($id);
        return view('frontend.web._pages.tour.book',$this->data);
    }

    public function bookSave(BookRequest $request, $id){
        $saveBooking = $this->bookRepo->saveData($request);
        if($saveBooking){
            session()->flash('notification-status', "info");
            session()->flash('notification-msg', "Booked Successfully.");
            return redirect()->route('booking.detail', $saveBooking->id);
        }
        return redirect()->back();
    }
}