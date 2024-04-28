<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Logic\GeneralLogic as Logic;
use App\Models\User;
use Auth;

//Events
use App\Events\SendEmailEvent;

//Services & Repositories
use App\Domain\Interfaces\Services\Backoffice\ICRUDService;
use App\Domain\Interfaces\Repositories\Backoffice\ITouristRepository;
use App\Domain\Interfaces\Repositories\Backoffice\ITourGuideRepository;

//Requests
use App\Http\Requests\Backoffice\TouristRegisterRequest;
use App\Http\Requests\Backoffice\TourGuideRegisterRequest;

class RegisterController extends Controller
{
    //do some magic
    public function __construct(Logic $logic, ICRUDService $CRUDservice, ITouristRepository $touristRepo, ITourGuideRepository $tourGuideRepo) {
        $this->logic = $logic;
        $this->CRUDservice = $CRUDservice;
        $this->touristRepo = $touristRepo;
        $this->tourGuideRepo = $tourGuideRepo;
		$this->middleware('backoffice.guest', ['except' => "logout"]);
	}

	public function signUp() {
		return view('backoffice.auth.register_tourguide');
	}

	public function register(TourGuideRegisterRequest $request) {
		$data = $this->CRUDservice->save($request, $this->tourGuideRepo);
        if($data){
            Auth::loginUsingId($data->user_id);
            return redirect()->route('backoffice.index');
        }
        return redirect()->back();
	}

	public function signUpTourist() {
		return view('backoffice.auth.register_tourist');
	}

	public function registerTourist(TouristRegisterRequest $request) {
		$data = $this->CRUDservice->save($request, $this->touristRepo);
        if($data){
            Auth::loginUsingId($data->user_id);
            return redirect()->route('backoffice.index');
        }
        return redirect()->back();
	}
}
