<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //
    public function __construct(){

     $this->middleware('guest',[
       'only'=>['create']


     ]);


    }
    public function create()
    {

        return view('sessions.create');
    }

    public function store(Request $request)
    {

        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            session()->flash('success', 'Welcome back!');
            return redirect()->intended(route('users.show', [Auth::user()]));

        } else {

            session()->flash('danger', 'Sorry, E-mail or password does not match');
            return redirect()->back();

        }

        return;
    }

    public function destroy()
    {

        Auth::logout();
        session()->flash('success', 'Logout successfully!');
        return redirect('login');

    }

}
