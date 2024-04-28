<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Domain\Interfaces\Repositories\Backoffice\IUserRepository;
use App\Domain\Interfaces\Repositories\Backoffice\IBookRepository;

class DashboardController extends Controller
{
    public function __construct(IUserRepository $repo, IBookRepository $bookRepo){
        $this->data = [];
        $this->repo = $repo;
        $this->bookRepo = $bookRepo;
        $this->data['title'] = 'Dashboard';
    }
    //Do some magic
    public function index(){
        $this->data['tourGuideCount'] = $this->repo->fetchTourGuides()->count();
        $this->data['touristCount'] = $this->repo->fetchTourist()->count();

        $this->data['calendar'] = [];

        $bookings = null;
        if(auth()->user()->type != 'tour_guide'){
            $bookings = $this->bookRepo->fetch();
        }else{
            $bookings = $this->bookRepo->myBookings();
        }
        foreach($bookings as $index => $booking){
            array_push($this->data['calendar'],[ 
                'title' => 'Tour : '.$booking->tour->name.', Tourist: '.$booking->user->fname.' '.$booking->user->lname, 
                'description' => 'Tour : '.$booking->tour->name, 
                'start' => date('Y-m-d',strtotime($booking->start)).'T'.date('H:i:s',strtotime($booking->start)), 
                'end' =>  date('Y-m-d',strtotime($booking->end)).'T'.date('H:i:s',strtotime($booking->end))
            ]);
        }
        $this->data['calendar'] = json_encode($this->data['calendar']);
        $this->data['bookings'] = $bookings;

    	return view('backoffice.index', $this->data);
    }
}
