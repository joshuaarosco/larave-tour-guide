<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;

//Repositories
use App\Domain\Interfaces\Repositories\Backoffice\IBookRepository;
use App\Domain\Interfaces\Repositories\Backoffice\ITourRepository;

class BookingController extends Controller
{
    public function __construct(ITourRepository $tourRepo, IBookRepository $bookRepo){
        $this->data = [];
        $this->bookRepo = $bookRepo;
        $this->tourRepo = $tourRepo;
    }

    public function detail($id){
        $this->data['book'] = $this->bookRepo->findOrFail($id);
        if(!$this->data['book']){
            return abort(404);
        }
        $this->data['tour'] = $this->tourRepo->findOrFail($this->data['book']->tour_id);
        return view('frontend.web._pages.book.view',$this->data);
    }
    
    public function index(){
        $this->data['bookings'] = $this->bookRepo->fetchMyBookings();
        return view('frontend.web._pages.book.index',$this->data);
    }
}
