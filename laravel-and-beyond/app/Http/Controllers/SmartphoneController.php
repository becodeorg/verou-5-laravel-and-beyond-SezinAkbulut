<?php

namespace App\Http\Controllers;

use App\Models\Smartphone;

class SmartphoneController extends Controller
{
    public function index()
    {
        $smartphones = Smartphone::all();

        // Pass the headphones data to the view
        return view('categories.smartphones.smartphones', ['smartphones' => $smartphones]);
    }
    public function show($id)
    {
        $smartphones = Smartphone::find($id);

        return view('smartphones.show', ['smartphones' => $smartphones]);
    }
}
