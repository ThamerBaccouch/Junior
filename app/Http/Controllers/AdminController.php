<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Question;
use App\Test;
use App\Course;
use Illuminate\Http\Request;

class AdminController extends Controller{

    public function dashboard(){
        return view("AdminPanel.index");
    }
    public function tests(Request $request){
             $tests = Test::all();
             $resp = Array("tests" => $tests);
             return view("AdminPanel.tests", $resp);

    }


    public function AddTest(Request $request){
        if ($request->isMethod('get')) {
            $courses=Course::all();

            $resp=Array("courses"=>$courses);
            return view("AdminPanel.addTest",$resp);
        }else if($request->isMethod('post')) {
            $request->validate([
                'TestName'=>'required|max:255'
            ]);
            $course_name=$request->input("course");
            $course_id=Course::where("name","=",$course_name)->get()->first()->id;
            $test=new Test;
            $test->name=$request->input("TestName");
            $test->id_course=$course_id;
            $test->save();
            return redirect("/Tests");
        }

    }

    public function DeleteTest($id){
        $test=Test::find($id);
        $questions=Question::where("id_test","=",$id)->get();
        foreach($questions as $question){
            $question->delete();
        }
        $test->delete();
        return redirect("/Tests");
    }

    public function editTest(Request $request,$id){

         if ($request->isMethod('get')) {
             $test=Test::find($id);
             $related_course=Course::find($test->id_course);
             $courses=Course::where("id","<>",$test->id_course)->get();
             $questions=Question::where("id_test","=",$id)->get();
             $resp=Array("test"=>$test,"related_course"=>$related_course,"courses"=>$courses,"questions"=>$questions);
             return view("AdminPanel.editTest",$resp);
         }else if($request->isMethod('post')) {
             $request->validate([
                'testName' => 'required|max:255',
                'course' => 'required',
            ]);
             $course_name=$request->input("course");
             $course_id=Course::where("name","=",$course_name)->get()->first()->id;

             $test=Test::find($id);
             $test->name=$request->input("testName");
             $test->id_course=$course_id;
             $test->save();

             $test=Test::find($id);
             $related_course=Course::find($test->id_course);
             $courses=Course::where("id","<>",$test->id_course)->get();
             $questions=Question::where("id_test","=",$id)->get();

             $resp=Array("success"=>"Succesfully modified Test.","test"=>$test,"related_course"=>$related_course,"courses"=>$courses,"questions"=>$questions);
             return view("AdminPanel.editTest",$resp);
         }
    }

    public function AddQuestion(Request $request,$id){


        if ($request->isMethod('get')) {
        $test=Test::find($id);

        $resp=Array("test"=>$test);
        return view("AdminPanel.addQuestion",$resp);
        }else if($request->isMethod('post')) {
            $request->validate([
                'question' => 'required|unique:questions,question|max:255',
                'rightAnswer' => 'required|max:255',
                'possible'=> 'required|max:255'
            ]);

            $question=$request->input("question");
            $right=$request->input("rightAnswer");
            $possible=$request->input("possible");

            $quest=new Question;
            $quest->question=$question;
            $quest->right_answer=$right;
            $quest->possible=$possible;
            $quest->id_test=$id;
            $quest->save();
            return redirect("/EditTest/".$id);

        }
    }

    public function DeleteQuestion($id_test,$id_question){
        $question=Question::find($id_question);
        $question->delete();
        return redirect("/EditTest/".$id_test);
    }

    public function EditQuestion(Request $request,$id_test,$id_question){
        if ($request->isMethod('get')) {
            $related_test = Test::find($id_test);
            $question=Question::find($id_question);
            $tests=Test::where("id","<>",$question->id_test)->get();
            $resp = Array("related_test" => $related_test,"question"=>$question,"tests"=>$tests);
            return view("AdminPanel.editQuestion", $resp);
        }else if ($request->isMethod('post')){
            $request->validate([
                'question' => 'required|max:255',
                'rightAnswer' => 'required|max:255',
                'possible'=> 'required|max:255',
                'test'=> 'required',
            ]);

            $test_name=$request->input("test");
            $test_id=Test::where("name","=",$test_name)->first()->id;

            $question=Question::find($id_question);
            $question->question=$request->input("question");
            $question->id_test=$test_id;
            $question->right_answer=$request->input("rightAnswer");
            $question->possible=$request->input("possible");
            $question->save();
            return redirect("/EditTest/".$id_test);
        }
    }

    public function courses(){
        $courses=Course::all();

        $resp=Array("courses"=>$courses);
        return view("AdminPanel.courses",$resp);
    }

    public function DeleteCourse($id){
        $course=Course::find($id);
        $course->delete();
        return redirect("/Courses");
    }




}
