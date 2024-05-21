<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Models\User;
class Usercheck extends Controller
{
    public function login(Request $request)
    {

    session_start();   
        
    $users = User::all();

if ($request->has('inlog')){
    $username = $request->input('name');
    $password = $request->input('email');

    foreach ($users as $user) {
        $userName = $user->name;
        $userpas = $user->email;

        if ($username == $userName && $password == $userpas) {
            $_SESSION['admin_logged_in'] = true;
            return redirect('/userdash');
            
           
        }
    }

    echo "<script>alert('Onjuiste gegevens'); window.location='/inloggen';</script>";
}
    }
    public function loginuit(Request $request){
        session_start();
        session_destroy();
        return redirect('/');
        
    }

    
}
