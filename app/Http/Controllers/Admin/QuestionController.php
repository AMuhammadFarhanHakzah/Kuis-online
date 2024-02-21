<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request) 
    {
        $data = $request->all();
        Question::create($data);

        return back();

    }

    public function destroy($id) 
    {
        Question::find($id)->delete();

        return back();
    }
}
