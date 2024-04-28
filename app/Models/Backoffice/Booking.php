<?php

namespace App\Models\Backoffice;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    use Notifiable, SoftDeletes;

    protected $table = 'booking';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    public function tour(){
        return $this->belongsTo('App\Models\Backoffice\Tour', 'tour_id','id');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id','id');
    }
}
