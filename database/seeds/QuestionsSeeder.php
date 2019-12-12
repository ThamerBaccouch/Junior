<?php

use Illuminate\Database\Seeder;
use App\Question;
class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question1=new Question;
        $question1->question="How to bypass Login with SQL?";
        $question1->right_answer="'or'1'='1";
        $question1->possible="select * from users:admin:union users";
        $question1->id_test=1;
        $question1->save();

        $question1=new Question;
        $question1->question="What is SQL injection without recieving Query result ?";
        $question1->right_answer="Blind SQL Injection";
        $question1->possible="impossible:stupid SQL Injection:Website is secured";
        $question1->id_test=1;
        $question1->save();

    }
}
