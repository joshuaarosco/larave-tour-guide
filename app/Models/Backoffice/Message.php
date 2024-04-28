<?php

namespace App\Models\Backoffice;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    use Notifiable, SoftDeletes;

    protected $table = 'messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function thread(){
        return $this->hasMany('App\Models\Backoffice\MessageThread', 'thread_id','id');
    }

    public function threadRecent(){
        return $this->hasMany('App\Models\Backoffice\MessageThread', 'thread_id','id')->orderBy('created_at', 'DESC')->first();
    }

    public function tourGuide(){
        return $this->belongsTo('App\Models\User', 'tour_guide_id','id');
    }

    public function tourist(){
        return $this->belongsTo('App\Models\User', 'tourist_id','id');
    }
}
