<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


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
}
