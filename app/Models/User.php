<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tourGuide(){
        return $this->hasOne('App\Models\Backoffice\TourGuide', 'user_id','id');
    }

    public function getAvatar(){
        if($this->directory!=null AND $this->filename!=null)
            return $this->directory.'/'.$this->filename;
        return 'assets/img/placeholder.png';
    }

    public function pop(){
        return $this->hasMany('App\Models\Backoffice\Subscription', 'user_id','id')->orderBy('created_at', 'DESC')->first();
    }
}
