<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        // Assuming you want to retrieve all users
        $users = User::all();

        // Pass the users variable to the view
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);

        return view("users.show", [
            "user" => $user,
        ]);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
}
