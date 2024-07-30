<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AnswerController extends Controller
{
    public function create(Request $request): View
    {
        $questions = Question::where('form_id',$request->form)->get();

        return view('answers.create',['questions'=>$questions,'response' => $request->response]);
    }
    public function store(Request $request):RedirectResponse
    {
        $responseId = $request->input('response_id');
        $answers = $request->input('answers');

        foreach ($answers as $questionId => $answer) {
            if (is_array($answer)) {
                foreach ($answer as $optionId) {
                    Answer::create([
                        'response_id' => $responseId,
                        'question_id' => $questionId,
                        'answer_option_id' => $optionId,
                    ]);
                }
            } else {
                Answer::create([
                    'response_id' => $responseId,
                    'question_id' => $questionId,
                    'answer' =>  $answer,
                    'answer_option_id' => is_numeric($answer) ? $answer : null,
                ]);
            }
        }

        return redirect()->route('responses.show',['id' => $responseId]);
    }
}
