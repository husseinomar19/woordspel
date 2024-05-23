<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Usercheck extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('name', 'email'); // Adjust based on actual fields

        $user = User::where('name', $credentials['name'])->where('email', $credentials['email'])->first();

        if ($user) {
            Auth::login($user); // This will handle session automatically

            return redirect('/userdash');
        }

        return redirect('/inloggen')->with('error', 'Onjuiste gegevens');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }

    public function profile()
    {
        if (Auth::check()) {
            $user = Auth::user();

            return view('userdash', ['user' => $user, 'pageTitle' => 'User Dash']);
        }

        return redirect('/inloggen')->with('error', 'Je moet ingelogd zijn om je profiel te bekijken');
    }
}
