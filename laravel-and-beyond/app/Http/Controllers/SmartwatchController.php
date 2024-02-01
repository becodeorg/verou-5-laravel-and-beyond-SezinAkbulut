<?php

namespace App\Http\Controllers;

use App\Models\Smartwatch;

class SmartwatchController extends Controller
{
    public function index()
    {
        $smartwatches = Smartwatch::all();

        return view('categories.smartwatchs.smartwatchs', ['smartwatchs' => $smartwatches]);
    }
    public function show($id)
    {
        $smartwatches = Smartwatch::find($id);

        return view('smartwatchs.show', ['smartwatchs' => $smartwatches]);
    }
}
