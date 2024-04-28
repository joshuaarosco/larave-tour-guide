<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;

//Repositories
use App\Domain\Interfaces\Repositories\Backoffice\ITourRepository;
use App\Domain\Interfaces\Repositories\Backoffice\ITourGuideRepository;
use App\Domain\Interfaces\Repositories\Backoffice\IDestinationRepository;

class DestinationController extends Controller
{
    public function __construct(IDestinationRepository $destinationRepo, ITourRepository $tourRepo, ITourGuideRepository $tourGuideRepo){
        $this->data = [];
        $this->tourGuideRepo = $tourGuideRepo;
        $this->destinationRepo = $destinationRepo;
        $this->data['toursSide'] = $tourRepo->orderBy('created_at', 'DESC')->paginate(3);
    }

    public function index(){
        $this->data['destinations'] = $this->destinationRepo->fetch();
        return view('frontend.web._pages.destination.index',$this->data);
    }

    public function detail($id){
        $this->data['destination'] = $this->destinationRepo->findOrFail($id);
        $tourGuideIds = $this->data['destination']->tours->pluck('user_id')->toArray();
        $this->data['tourGuides'] = $this->tourGuideRepo->fetchTourguides($tourGuideIds);
        if(!$this->data['destination']){
            return abort(404);
        }
        return view('frontend.web._pages.destination.view',$this->data);
    }
}