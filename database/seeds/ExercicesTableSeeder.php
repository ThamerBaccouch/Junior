<?php

use Illuminate\Database\Seeder;
use App\Test;
use App\Course;
class ExercicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course=new Course;
        $course->name="SQL Injection Course 1";
        $course->text="test test test test ";
        $course->save();

        $course2=new Course;
        $course2->name="RSA - common modulus";
        $course2->text="test2 test2 test2 test2";
        $course2->save();

        $test=new Test;
        $test->name="Common SQL Injection Filter";
        $test->id_course=$course->id;
        $test->save();

        $test2=new Test;
        $test2->name="Common Modulus Attack";
        $test2->id_course=$course2->id;
        $test2->save();
    }
}
