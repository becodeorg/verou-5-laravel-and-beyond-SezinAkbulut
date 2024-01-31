<?php
namespace App\Http\Controllers;

use App\Models\Headphones;

class HeadphonesController extends Controller
{
    public function index()
    {
        $headphones = Headphones::all();
        return view('headphones.headphones', compact('headphones'));
    }
}
