<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Response;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ResponseController extends Controller
{
    public function store(Request $request):RedirectResponse
    {
        $form_id = $request->form;
        $user_id = $request->user;

       $response = Response::create([
            'form_id' => $form_id,
            'user_id' => $user_id,

        ]);
        return redirect()->route('answers.create',['form' => $form_id,'response' => $response]);
    }

    public function show(Response $response)
    {
        $response->load('form.questions', 'answers.answerOptions');
//        dd($response->load('form.questions', 'answers.answerOptions'));
        return view('responses.show', compact('response'));
    }
}
