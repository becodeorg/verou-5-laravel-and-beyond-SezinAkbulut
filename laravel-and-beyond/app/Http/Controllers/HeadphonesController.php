<?php
namespace App\Http\Controllers;

use App\Models\Headphones;
use Illuminate\Http\Request;

class HeadphonesController extends Controller
{
    public function index()
    {
        $headphones = Headphones::all();

        return view('categories.headphones.headphones', ['headphones' => $headphones]);
    }
    public function show($id)
    {
        $headphones = Headphones::find($id);

        return view('headphones.show', ['headphones' => $headphones]);
    }

}
