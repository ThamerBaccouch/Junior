<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table="users";


    public function tests(){
       return  $this->belongsToMany("App\Test");
    }
}
