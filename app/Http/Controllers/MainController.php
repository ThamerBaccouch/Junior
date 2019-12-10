<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{

    public function HomePage()
    {
        $active=array("home"=>"active");
        return view("Main.index",$active);
    }

    public function CoursePage(){
        $active=array("course"=>"active");
        return view("Main.course-archive",$active);
    }

    public function EventsPage(){
        $active=array("events"=>"active");
       return view("Main.events-archive",$active);
    }

    public function ContactPage(){
        $active=array("contact"=>"active");
        return view("Main.contact",$active);
    }

    public function GalleryPage(){
        $active=array("gallery"=>"active");
        return view("Main.gallery",$active);
    }



    public function test(Request $request)
    {
        /*
        $userData = User::where([
            ['email','=',$request->input('email')],
                     ])->first();
            var_dump($userData);
            echo Hash::make($request->input("password"));
        */

        $user = Array("email" => "thamer@gmail.com", "password" => "thamer");
        if (Auth::attempt($user))
        {
            echo "connected";
            echo Auth::check();
            Auth::logout();
            echo Auth::check();
        }
        else
            echo "false";

        }

}
