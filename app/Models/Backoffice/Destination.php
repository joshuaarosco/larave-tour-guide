<?php

namespace App\Models\Backoffice;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    //
    use Notifiable, SoftDeletes;

    protected $table = 'destinations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function destinationImage(){
        return $this->hasOne('App\Models\Backoffice\DestinationImage', 'destination_id','id')->where('is_thumb', true);
    }

    public function thumbnail(){
        return $this->destinationImage->directory."/".$this->destinationImage->filename;
    }
    
    public function tours(){
        return $this->hasMany('App\Models\Backoffice\Tour', 'destination_id','id');
    }
}
