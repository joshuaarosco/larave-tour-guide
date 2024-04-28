<?php

namespace App\Models\Backoffice;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class MessageThread extends Model
{
    //
    use Notifiable, SoftDeletes;

    protected $table = 'message_thread';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function message(){
        return $this->belongsTo('App\Models\Backoffice\Message', 'thread_id','id');
    }
}
