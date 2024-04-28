<?php

namespace App\Logic;
use Illuminate\Http\Request;

use Carbon\Carbon;

class GeneralLogic
{
    //Do some magic
    public function loginLogic(Request $request, $redirect_uri = NULL){
        $username = $request->get('username');
        $password = $request->get('password');
        $remember = $request->get('remember_me');

        $field = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->attempt([$field => $username, 'password' => $password], $remember)) {
            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Welcome back!");

            if($redirect_uri AND session()->has($redirect_uri)){
                return redirect( session()->get($redirect_uri) );
            }

            return redirect()->back();
        }

        session()->flash('notification-status', "warning");
        session()->flash('notification-msg', "Invalid username or password.");

        return redirect()->back();
    }

    public function logoutLogic(){
        auth()->logout();
        return redirect()->route('backoffice.auth.login');
    }

    public function redirectUser($type){
        session()->flash('notification-status','warning');
        session()->flash('notification-msg',"You don't have enough access.");
        switch ($type) {
            case 'tourist':
                return redirect()->route('index');
            break;

            default:
                return redirect('backoffice.index');
            break;
        }
    }

    static public function isToday($date, $format){
        $date = Carbon::parse(date('y-m-d H:i:s', strtotime($date)));
        if($date->isToday())
            return 'Today';
        return date($format, strtotime($date));
    }
}
