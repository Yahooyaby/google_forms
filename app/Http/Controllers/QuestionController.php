<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;
use App\Enums\QuestionTypeEnum;


class QuestionController extends Controller
{


    public function create(Request $request): View
    {
        $questionTypes = collect(QuestionTypeEnum::cases())->map(function ($case) {
            return $case->value;
        })->values()->all();

        return view('question.create', ['questionType' => $questionTypes,'form_id' => $request->user()->id]);
    }
    public function store(Request $request)
    {

        $request->user()->questions()->create([
            'question_text' => $request->question_text,
            'question_type' => $request->question_type,
            'form_id' => URL::current()[28]


        ]);
        return redirect()->back();
    }


    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->back();
    }
}
