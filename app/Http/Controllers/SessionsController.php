<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions/create');
    }

    public function store(Request $request)
    {
        $credentials = $request -> only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect() -> route('root');
        }
    }

    public function destroy(User $user)
    {
        Auth::logout();
        return redirect() -> route('root');
    }
}
