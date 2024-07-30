<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormStoreRequest;
use App\Models\Form;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FormController extends Controller
{
    public function home():View
    {
        $forms = Form::all();

        return view('forms.home',['forms' => $forms]);
    }

    public function index(Request $request):View
    {


        $forms = Form::where('user_id',$request->user()->id)->get();

        return view('forms.index',['forms'=>$forms]);
    }

    public function store(FormStoreRequest $request) :RedirectResponse
    {
        $request->user()->form()->create([
            'name' => $request->name,
            'user_id' => $request->user()->id,
        ]);
        return redirect()->back();
    }
    public function show(Request $request, $id): View
    {
        $form = Form::findOrFail($id);
        $questions = $form->questions()->with('answerOptions')->get();

        return view('forms.show', compact('form', 'questions'));
    }
    public function edit(Form $form):View
    {
        return view('forms.edit', ['form' => $form]);
    }
    public function update(Request $request, Form $form):RedirectResponse
    {
        $form->update($request->all());

        return redirect()->route('forms.index');
    }
    public function destroy(Form $form):RedirectResponse
    {
        $form->delete();
        return redirect()->back();
    }
}
