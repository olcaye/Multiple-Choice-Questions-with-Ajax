<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AnswerController extends Controller {

    public function checkAnswer(Request $request) {

        $input = $request->all();

        $answers = DB::table('answers')->select('answers.*')
            ->join('questions', 'QuestionID', '=', 'questions.id')
            ->where('postID', '=', $input['post-id'])
            ->where('isCorrect', "=", true)
            ->groupBy('QuestionID')
            ->orderBy('QuestionID')
            ->get();

        if(!$answers->isEmpty()) {
            $questions = DB::table('questions')
                ->select('id', 'correctAnswerID')
                ->where('postID', $input['post-id'])
                ->get();

            $posts = DB::table('posts')
                ->select('resultImage')
                ->where('id', $input['post-id'])
                ->first();

            $totalQuestionNo = $questions->count();

            $totalCorrectAnswer = 0;
            $totalIncorrectAnswer = 0;
            $emptyQuestionNumber = 0;

            if(!empty($answers) || !empty($questions) || !empty($posts)) {
                foreach ($answers as $answer) {
                    if (array_key_exists($answer->QuestionID, $input)) {
                        if($input[$answer->QuestionID] == $answer->id) {
                            $totalCorrectAnswer++;
                        }  else {
                            $totalIncorrectAnswer++;
                        }
                    } elseif(!isset($input[$answer->QuestionID]) || empty($input[$answer->QuestionID]) ) {
                        $emptyQuestionNumber++;
                    }
                }
                $successRate = round(($totalCorrectAnswer / $totalQuestionNo) * 100);

                $data = array(
                    'postID' =>  (int) $input['post-id'],
                    'successRate' => $successRate ?? null,
                    'totalCorrect' => $totalCorrectAnswer ?? null,
                    'resultImage' => $posts->resultImage ?? null
                );

                Session::push('completedPosts' , $data);
            }
        }


        return response()->json([
            'successRate' => $successRate ?? null,
            'totalCorrect' => $totalCorrectAnswer ?? null,
            'resultImage' => $posts->resultImage ?? null,
        ]);
    }
}
