<?php

namespace App\Models\Backoffice;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    //
    use Notifiable, SoftDeletes;

    protected $table = 'tours';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function gallery(){
        return $this->hasMany('App\Models\Backoffice\TourGallery', 'tour_id','id');
    }

    public function tourImage(){
        return $this->hasOne('App\Models\Backoffice\TourImage', 'tour_id','id')->where('is_thumb', true);
    }

    public function thumbnail(){
        return $this->tourImage->directory."/".$this->tourImage->filename;
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id','id');
    }

    public function destination(){
        return $this->belongsTo('App\Models\Backoffice\Destination', 'destination_id','id');
    }
}
