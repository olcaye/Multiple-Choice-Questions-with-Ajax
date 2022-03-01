<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Post;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index($pid) {

        $questions = DB::table('questions')->select('id', 'visible','question', 'postID', 'question_order', 'answers')
            ->where('postID', '=', $pid)
            ->get();

         foreach($questions as $question) {
             $answers = DB::table('answers')->select('answers.id', 'answers.QuestionID', 'answers.answer')
                 ->join('questions', 'QuestionID', '=', 'questions.id')
                 ->where('postID', '=', $pid)
                 ->where('QuestionID', '=', $question->id)
                 ->get();

             $question->answers = $answers;

             DB::table('questions')
                 ->where('postID', $pid)
                 ->where('id', $question->id)
                 ->update(['answers' => $answers]);
             }

        return response()->json([
            'questions' => $questions
        ]);
    }

}
