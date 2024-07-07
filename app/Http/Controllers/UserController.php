<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use function Laravel\Prompts\password;


class UserController extends Controller
{
    public function index():View
    {
        return view('welcome');
    }

    public function create():View
    {
        return view('authorize.register');
    }

    public function store(UserStoreRequest $request):RedirectResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        if($user){
            Auth::login($user);
        }
        return redirect()->route('home');
    }

    public function login():View
    {
        return view('authorize.login');
    }

    public function logging(UserLoginRequest $request):RedirectResponse
    {

        if(Auth::attempt([
            'email' => $request->email,
            'password' =>  $request->password
        ]))
        {
            return redirect()->route('home');
        }
        return redirect()->route('login')
            ->withErrors(['email'=>'Пользователь не найден или данные введены неверно']);
    }

    public function logout():RedirectResponse
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
