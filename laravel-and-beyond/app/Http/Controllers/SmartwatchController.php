<?php

namespace App\Http\Controllers;

use App\Models\Smartwatch;

class SmartwatchController extends Controller
{
    public function index()
    {
        $smartwatches = Smartwatch::all();
        return view('smartwatch.smartwatch', compact('smartwatches'));
    }
}
