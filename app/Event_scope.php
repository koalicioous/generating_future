<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class Event_scope extends Model
{
    public function events(){
        return $this->belongsTo('\App\Event');
    }

}
