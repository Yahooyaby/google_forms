<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Form $form, User $user):RedirectResponse
    {
        Response::create([
            'form_id' => $form->id,
            'user_id' => $user->id,

        ]);
        return redirect()->back();
    }
}
