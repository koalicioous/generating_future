<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event_type;
use App\Event_scope;

class Event extends Model
{
    protected $fillable = [
        'event_name','event_desc','event_city','event_country','start_date','finish_date','event_type_id','event_scope_id','user_id'
    ];

    public function event_type(){
        return $this->belongsTo('App\Event_type','event_type_id','event_type_id');
    }

    public function event_scope(){
        return $this->belongsTo('App\Event_scope','event_scope_id','event_scope_id');
    }
}
