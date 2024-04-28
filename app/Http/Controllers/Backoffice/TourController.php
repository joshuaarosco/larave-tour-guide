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
use App\Domain\Interfaces\Repositories\Backoffice\ITourRepository;
use App\Domain\Interfaces\Repositories\Backoffice\IDestinationRepository;

//Requests
use App\Http\Requests\Backoffice\TourRequest;

class TourController extends Controller
{
    //do some magic
    public function __construct(Logic $logic, ITourRepository $repo, IDestinationRepository $destinationRepo, ICRUDService $CRUDservice) {
        $this->repo = $repo;
        $this->logic = $logic;
        $this->CRUDservice = $CRUDservice;
        $this->destinationRepo = $destinationRepo;
        $this->data = [];
        $this->data['title'] = 'Tour';
        $this->data['tour'] = null;
        $this->data['destinations'] = $this->destinationRepo->fetch();
	}

	public function index() {
        $this->data['tours'] = $this->repo->fetch();
		return view('backoffice.pages.tour.index', $this->data);
	}

    public function grid(){
        $this->data['products'] = $this->repo->fetch();
		return view('backoffice.pages.product.grid', $this->data);
    }

    public function edit($id){
        $this->data['tour'] = $this->repo->findOrFail($id);
		return view('backoffice.pages.tour.view', $this->data);
    }

    public function update(Request $request){
        $crudData = $this->CRUDservice->save($request, $this->repo);
        return redirect()->route('backoffice.tour.index');
    }

    public function create(){
        return view('backoffice.pages.tour.view', $this->data);
    }

    public function store(TourRequest $request){
        $crudData = $this->CRUDservice->save($request, $this->repo);
        return redirect()->route('backoffice.tour.index');
    }

    public function delete($id){
        return $this->CRUDservice->delete($id, $this->repo);
    }

    public function gallery($id){
        $this->data['tour'] = $this->repo->findOrFail($id);
        $this->data['pictures'] = $this->data['tour']->gallery;
        return view('backoffice.pages.tour.gallery', $this->data);
    }

    public function upload(Request $request){
        $upload = $this->repo->upload($request);
        return redirect()->back();
    }

    public function deletePic($id, $picId){
        $delete = $this->repo->deletePic($id, $picId);
        return redirect()->back();
    }
}
