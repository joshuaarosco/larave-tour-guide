<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;

//Repositories
use App\Domain\Interfaces\Repositories\Backoffice\ITourRepository;
use App\Domain\Interfaces\Repositories\Backoffice\IMessageRepository;

class MessageController extends Controller
{
    public function __construct(IMessageRepository $messageRepo, ITourRepository $tourRepo){
        $this->data = [];
        $this->messageRepo = $messageRepo;
        $this->data['toursSide'] = $tourRepo->orderBy('created_at', 'DESC')->paginate(3);
        $this->data['message'] = null;
    }

    public function index(){
        if(!auth()->check()){
            return abort(404);
        }
        $this->data['messages'] = $this->messageRepo->fetch();
        return view('frontend.web._pages.messages.index',$this->data);
    }

    public function createMessage($id){
        $created = $this->messageRepo->createMessage($id);
        return redirect()->route('messages.thread', $created->id);
    }

    public function thread($id){
        $this->data['message'] = $this->messageRepo->findOrFail($id);
        if(!$this->data['message'] || !auth()->check()){
            return abort(404);
        }
        $this->data['messages'] = $this->messageRepo->fetch();
        return view('frontend.web._pages.messages.index',$this->data);
    }

    public function send(Request $request, $id){
        if(!auth()->check()){
            return abort(404);
        }
        $send = $this->messageRepo->sendMessage($request, $id);
        return redirect()->back();
    }
}