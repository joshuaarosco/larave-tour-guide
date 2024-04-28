<?php

namespace App\Models\Backoffice;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TourImage extends Model
{
    //
    use Notifiable, SoftDeletes;

    protected $table = 'tour_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function tour(){
        return $this->belongsTo('App\Models\Tour', 'tour_id','id');
    }
}
