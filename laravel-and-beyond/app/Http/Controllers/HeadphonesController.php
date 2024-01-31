<?php
namespace App\Http\Controllers;

use App\Models\Headphones;
use Illuminate\Http\Request;

class HeadphonesController extends Controller
{
    public function index()
    {
        // Fetch all headphones from the database
        $headphones = Headphones::all();

        // Pass the headphones data to the view
        return view('categories.headphones.headphones', ['headphones' => $headphones]);
    }
    public function show($id)
    {
        // Assuming you have a model named Headphones
        $headphones = Headphones::find($id);

        return view('headphones.show', ['headphones' => $headphones]);
    }

}
