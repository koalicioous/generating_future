<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;
use App\Competition;

class Event_scope extends Model
{
    public function events(){
        return $this->belongsTo('\App\Event');
    }

    public function competitions(){
        return $this->belongsTo('\App\Competition','event_scope_id','event_scope_id');
    }

}
