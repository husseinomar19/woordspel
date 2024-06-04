<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return(view('signup'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  // Valideren van de invoervelden
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
    
        // Nieuwe gebruiker aanmaken en opslaan
        $gebruiker = new User;
        $gebruiker->name = $request->input('name');
        $gebruiker->email = $request->input('email');
        $gebruiker->save();
    
        // Doorsturen naar de homepage
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = "Gebruiker Update";
        return view('aanpassen', [
            'item' => User::findOrFail($id),
            'pageTitle' => $pageTitle
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = User::findOrFail($id);
        $update->name = $request->input('naamitem');
        $update->email = $request->input('prijs');
        $update->save();
        
        return redirect('/userdash');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
