<?php

namespace App\Models\Backoffice;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TourGallery extends Model
{
    //
    use Notifiable, SoftDeletes;

    protected $table = 'tour_gallery';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    public function tour(){
        return $this->belongsTo('App\Models\Backoffice\Tour', 'tour_id','id');
    }

    public function thumbnail(){
        return $this->directory.'/'.$this->filename;
    }
}
