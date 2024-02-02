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
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // validate request
        $validated = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        // attempt to login user
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect("show.home");
        }

        return back();
    }

    public function destroy()
    {
        Auth::logout();
        return redirect("show.home");
    }

}
