<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{    public $table="users";


    public function tests(){
       return  $this->belongsToMany("App\Test");
    }



}
