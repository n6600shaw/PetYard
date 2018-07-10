<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function create()
    {

        return view('users.create');

    }
    public function show(User $user)
    {

        return view('users.show', compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
            'password_confirmation' => 'same:password',

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]
        );

        //direct to user personal page after login
        Auth::login($user);
        session()->flash('success', 'Welcome!');
        return redirect()->route('users.show', [$user]);

    }
}
