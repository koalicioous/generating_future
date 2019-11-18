<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class Event_type extends Model
{
    
    public function events(){
        return $this->belongsTo('\App\Event');
    }

}
