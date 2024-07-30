<?php

namespace App\Http\Controllers;


use App\Models\AnswerOption;
use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class AnswerOptionController extends Controller
{

    public function store(Request $request) :RedirectResponse
    {

        AnswerOption::create([
            'option_text' => $request->option_text,
            'question_id' => $request->question
        ]);

        return redirect()->back();
    }

}
