<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;

//Repositories
use App\Domain\Interfaces\Repositories\Backoffice\ITourGuideRepository;

class TourGuideController extends Controller
{
    public function __construct(ITourGuideRepository $tourGuideRepo){
        $this->data = [];
        $this->tourGuideRepo = $tourGuideRepo;
    }

    public function index(){
        $this->data['tourGuides'] = $this->tourGuideRepo->fetch();
        // dd($this->data['tourGuides']);
        return view('frontend.web._pages.tour_guide.index',$this->data);
    }

    public function detail($id){
        $this->data['tourGuide'] = $this->tourGuideRepo->findTourGuide($id);
        if(!$this->data['tourGuide']){
            return abort(404);
        }
        return view('frontend.web._pages.tour_guide.view',$this->data);
    }
}