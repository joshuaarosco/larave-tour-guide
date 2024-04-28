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
use App\Domain\Interfaces\Repositories\Backoffice\IDestinationRepository;

//Requests
use App\Http\Requests\Backoffice\DestinationRequest;

class DestinationController extends Controller
{
    //do some magic
    public function __construct(Logic $logic, IDestinationRepository $repo, ICRUDService $CRUDservice) {
        $this->repo = $repo;
        $this->logic = $logic;
        $this->CRUDservice = $CRUDservice;
        $this->data = [];
        $this->data['title'] = 'Destination';
        $this->data['destination'] = null;
	}

	public function index() {
        $this->data['destinations'] = $this->repo->fetch();
		return view('backoffice.pages.destination.index', $this->data);
	}

    public function grid(){
        $this->data['products'] = $this->repo->fetch();
		return view('backoffice.pages.product.grid', $this->data);
    }

    public function edit($id){
        $this->data['destination'] = $this->repo->findOrFail($id);
		return view('backoffice.pages.destination.view', $this->data);
    }

    public function update(Request $request){
        $crudData = $this->CRUDservice->save($request, $this->repo);
        return redirect()->route('backoffice.destination.index');
    }

    public function create(){
        return view('backoffice.pages.destination.view', $this->data);
    }

    public function store(DestinationRequest $request){
        $crudData = $this->CRUDservice->save($request, $this->repo);
        return redirect()->route('backoffice.destination.index');
    }

    public function delete($id){
        return $this->CRUDservice->delete($id, $this->repo);
    }
}
