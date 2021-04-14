<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationsController extends Controller
{
    public function create()
    {
        if (!Auth::check()) {
            return view('registrations/create');
        } else {
            return redirect() -> route('root');
        }
    }

    public function store(Request $request)
    {
        $user = new User;
        if ($request -> filled('name')) {
            $user -> name = $request -> name;
        }

        $user -> email = strtolower($request -> email);
        if ($request -> password === $request -> password_confirm) {
            $user -> password = Hash::make($request -> password);
        } else {
            return redirect() -> route('new_user_registration');
        }

        $user -> save();
        $credentials = array(
            'email' => $user -> email,
            'password' => $request -> password
        );

        if (Auth::attempt($credentials)) {
            return redirect() -> route('root');
        }
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
