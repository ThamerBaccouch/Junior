<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public $table="tests";

    public function course(){
        return $this->belongsTo("App/Course");
    }

    public function questions(){
        return $this->hasMany("App/Question");
    }

    public function users(){
        return $this->belongsToMany("App/User");
    }
}
