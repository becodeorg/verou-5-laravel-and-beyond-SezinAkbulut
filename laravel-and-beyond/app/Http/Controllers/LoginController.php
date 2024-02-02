<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
public function index()
{

}
    public function login (Request $request)
    {
        //validate request
        $validated  = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        //Attempt to login user
        if (Auth ::attempt($validated)) {
            $request ->session()->regenerate();
            return redirect("show.home");
        }
        return  back();
        //Redirct to home page
    }

    public function destroy ()
    {
        aut () -> logut();
        return redirect (   "show.home");
    }

}
