<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Response;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ResponseController extends Controller
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
