<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Competition;

class Prize extends Model
{
    
    public function competitions(){

        return $this->belongsTo('App\Competition');

    }

}
