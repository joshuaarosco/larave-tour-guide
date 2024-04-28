<?php

namespace App\Models\Backoffice;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TourGuide extends Model
{
    //
    use Notifiable, SoftDeletes;

    protected $table = 'tour_guides';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id','id');
    }

    public function getAvatar(){
        if($this->directory!=null AND $this->filename!=null)
            return $this->directory.'/'.$this->filename;
            return 'assets/img/placeholder.png';
    }
}
