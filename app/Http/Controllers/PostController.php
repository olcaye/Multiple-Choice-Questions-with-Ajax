<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Question;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function isCompleted(Request $request, $pid) {

       if ($request->session()->has('completedPosts')) {
            $completedPosts = session()->get('completedPosts');
           return response()->json([
               'data' => $completedPosts,
           ]);
        }
           return redirect()->route('questions', ['pid' => $pid]);

    }

    public function index() {
        $posts = Post::query()->where('active', 1)->orderByDesc('#ofCompletions')->limit(3)->get();
        return response()->json([
            'posts' => $posts,
        ]);
    }

}
