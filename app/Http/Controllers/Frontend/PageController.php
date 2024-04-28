<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;

//Repositories
use App\Domain\Interfaces\Repositories\Backoffice\ITourRepository;
use App\Domain\Interfaces\Repositories\Backoffice\ITourGuideRepository;
use App\Domain\Interfaces\Repositories\Backoffice\IDestinationRepository;

class PageController extends Controller
{
    public function __construct(IDestinationRepository $destinationRepo, ITourRepository $tourRepo, ITourGuideRepository $tourGuideRepo){
        $this->data = [];
        $this->data['destinations'] = $destinationRepo->limit(4)->get();
        $this->data['tours'] = $tourRepo->fetch();
        $this->data['tourGuides'] = $tourGuideRepo->fetchFeatured();
    }

    public function index(){
        return view('frontend.web.index',$this->data);
    }
}
