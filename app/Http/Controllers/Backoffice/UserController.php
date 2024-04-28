<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Events
use App\Events\SendEmailEvent;

//Services & Repositories
use App\Domain\Interfaces\Services\Backoffice\ICRUDService;
use App\Domain\Interfaces\Repositories\Backoffice\IUserRepository;

//Request Validator
use App\Http\Requests\Backoffice\UserRequest;

//Global Classes
use Input;

class UserController extends Controller
{
    //Do some magic
    public function __construct(IUserRepository $repo, ICRUDService $CRUDservice){
        $this->data = [];
        $this->repo = $repo;
        $this->CRUDservice = $CRUDservice;
        $this->data['user_types'] = __('user_type');
    }

    public function index(){
        $this->data['title'] = 'Admin';
        $this->data['users'] = $this->repo->fetch();
        return view('backoffice.pages.user.index',$this->data);
    }

    public function create(UserRequest $request){
        $crudData = $this->CRUDservice->save($request, $this->repo);
        event(new SendEmailEvent($crudData,'new_user'));
        return redirect()->back();
    }

    public function view($id){
        $this->data['event'] = $this->repo->findOrFail($id);
        if(!$this->data['event']){
            return abort(404);
        }
        return view('backoffice.pages.user.view', $this->data);
    }

    public function edit(){
        $data['datas'] = $this->repo->findOrFail(Input::get('_id'));
        return response()->json($data,200);
    }

    public function update(Request $request){
        $crudData = $this->CRUDservice->save($request, $this->repo);
        return redirect()->back();
    }

    public function delete($id){
        return $this->CRUDservice->delete($id, $this->repo);
    }

    public function tourGuide(){
        $this->data['title'] = 'Tour Guide';
        $this->data['users'] = $this->repo->fetchTourGuides();
        return view('backoffice.pages.user.index',$this->data);
    }

    public function tourist(){
        $this->data['title'] = 'Tourist';
        $this->data['users'] = $this->repo->fetchTourist();
        return view('backoffice.pages.user.index',$this->data);
    }

    public function createMember(MemberRequest $request){
        $crudData = $this->CRUDservice->save($request, $this->repo);
        event(new SendEmailEvent($crudData,'new_user'));
        event(new SendEmailEvent($crudData,'admin_notif'));
        return redirect()->back();
    }

    public function editMember(){
        $data['datas'] = $this->repo->findOrFailMember(Input::get('_id'));
        return response()->json($data,200);
    }

    public function updateMember(Request $request){
        $member = $this->repo->saveMember($request);
        if(!$member){
            session()->flash('notification-status', "danger");
            session()->flash('notification-msg', __('msg.error'));
        }
        session()->flash('notification-status', "success");
        session()->flash('notification-msg', __('msg.save_success'));
        return redirect()->back();
    }

    public function isFeatured($id){
        $isFeatured = $this->repo->isFeatured($id);
        if(!$isFeatured){
            session()->flash('notification-status', "danger");
            session()->flash('notification-msg', __('msg.error'));
        }
        session()->flash('notification-status', "success");
        session()->flash('notification-msg', __('msg.save_success'));
        return redirect()->back();
    }

}
