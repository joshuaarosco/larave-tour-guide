<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Logic\GeneralLogic as Logic;
use App\Models\User;
use Auth, Input;

//Events
use App\Events\SendEmailEvent;

//Services & Repositories
use App\Domain\Interfaces\Services\Backoffice\ICRUDService;
use App\Domain\Interfaces\Repositories\Backoffice\IBookRepository;

//Requests
use App\Http\Requests\Backoffice\DestinationRequest;

class BookingController extends Controller
{
    //do some magic
    public function __construct(Logic $logic, IBookRepository $repo, ICRUDService $CRUDservice) {
        $this->repo = $repo;
        $this->logic = $logic;
        $this->CRUDservice = $CRUDservice;
        $this->data = [];
        $this->data['title'] = 'Booking';
        $this->data['destination'] = null;
        $this->data['statuses'] = [
            'Pending',
            'Scheduled',
            'Completed',
        ];
	}

	public function index() {
        $bookings = null;
        if(auth()->user()->type != 'tour_guide'){
            $bookings = $this->repo->fetch();
        }else{
            $bookings = $this->repo->myBookings();
        }
        $this->data['bookings'] = $bookings;
		return view('backoffice.pages.book.index', $this->data);
	}

    public function view($id){
        $this->data['booking'] = $this->repo->findOrFail($id);
        return view('backoffice.pages.book.view', $this->data);
    }

    public function update(Request $request, $id){
        $booking = $this->repo->updateBooking($request, $id);
        return redirect()->route('backoffice.booking.index');
    }
}
