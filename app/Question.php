<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $table="questions";

    public function test(){
        return $this->belongsTo("App\Test");
    }
}
