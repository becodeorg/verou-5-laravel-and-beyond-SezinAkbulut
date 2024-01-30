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
            'password' => 'required|string|min:6',
        ]);

        // Create a new user
        User::create([
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Redirect with a success message
        return redirect()->route('show.home')->with('success', 'You registered successfully!');
    }
}
