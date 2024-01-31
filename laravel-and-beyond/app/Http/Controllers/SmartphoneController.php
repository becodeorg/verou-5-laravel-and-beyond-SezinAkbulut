<?php

namespace App\Http\Controllers;

use App\Models\Smartphone;

class SmartphoneController extends Controller
{
    public function index()
    {
        $smartphones = Smartphone::all();
        return view('smartphone.smartphone', compact('smartphones'));
    }
}
