<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;
use App\Enums\QuestionTypeEnum;


class QuestionController extends Controller
{
    private function getQuestionTypes(): array
    {
        return collect(QuestionTypeEnum::cases())->map(function ($case) {
            return $case->value;
        })->values()->all();
    }

    public function create(Form $form): View
    {
        $questionTypes = $this->getQuestionTypes();

        return view('questions.create', ['questionTypes' => $questionTypes,'form' => $form]);
    }
    public function store(Request $request, Form $form): RedirectResponse
    {
        $request->user()->question()->create([
            'question_text' => $request->question_text,
            'question_type' => $request->question_type,
            'form_id' => $form->id
        ]);
        return redirect()->back();
    }

    public function edit(Question $question):View
    {
        $questionTypes = $this->getQuestionTypes();

        return view('questions.edit', ['question' => $question,'questionTypes' => $questionTypes]);
    }
    public function update(Request $request, Question $question):RedirectResponse
    {
        $question->update($request->all());

        return redirect()->route('forms.show',['form'=>$question->form_id]);
    }

    public function destroy(Question $question):RedirectResponse
    {
        $question->delete();
        return redirect()->back();
    }
}
