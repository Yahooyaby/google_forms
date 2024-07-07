<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormStoreRequest;
use App\Models\Form;
use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FormController extends Controller
{
    public function index(Request $request):View
    {


        $forms = Form::where('user_id',$request->user()->id)->get();

        return view('index',['forms'=>$forms]);
    }

    public function store(FormStoreRequest $request) :RedirectResponse
    {
        $request->user()->form()->create([
            'name' => $request->name,
            'user_id' => $request->user()->id,
        ]);
       return redirect()->back();
    }
    public function show(Request $request):View
    {
        $form = Form::where('id',$request->user()->id)->first();
        $questions = Question::where('for');

        return view('show',['form' => $form]);
    }
    public function destroy(Form $form) :RedirectResponse
    {
        $form->delete();
        return redirect()->back();
    }
}
