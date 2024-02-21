<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $quizzes = Quiz::orderBy('id', 'desc')->get(); 


        return view('pages.home.homepage', compact('quizzes'));
    }

    public function detail($id) 
    {
        $quiz = Quiz::find($id);
        
        return view('pages.home.detail', compact('quiz'));
    }

    public function question($quiz_id, $question_id)
    {
        $question = Question::where('quiz_id', $quiz_id)->find($question_id);

        return view('pages.home.pertanyaan', compact('quiz_id', 'question'));
    }

    public function question_store($quiz_id, $question_id, Request $request) 
    {
        $data = $request->all();
        
        $user = Question::where();

        Answer::create($data);
    }
}
