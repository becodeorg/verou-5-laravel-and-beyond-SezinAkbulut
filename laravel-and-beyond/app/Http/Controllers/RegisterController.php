<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view("sessions.register");
    }

    public function create(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|confirmed|string|min:6',
        ]);

        // Create a new user

        User::create([
            'name' => $request->input('name'),
            'email' => $request->email,
            'password' => Hash::make($request->input('password')),


        ]);

        $user->save();

        auth()->login($user);

        // Redirect with a success message
        return redirect()->route('show.home')->with('success', 'You registered successfully!');
    }

    public function login (Request $request)
    {
        //validate request

        //Attempt to login user

        //Redirct to home page
    }

    public function destroy ()
    {
        aut () -> logut();
        return redirect (   "show.home");
    }
}
