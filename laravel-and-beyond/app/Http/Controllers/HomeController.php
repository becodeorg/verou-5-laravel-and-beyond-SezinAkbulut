<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $popularTrendProducts = Product::popularTrend()->get();
        $randomProduct = Product::inRandomOrder()->first();


        $remainingTime = [
            'hours' => 3, // Replace with the actual remaining hours
            'minutes' => 0,
            'seconds' => 0,
        ];

        $remainingTimeInSeconds = $remainingTime['hours'] * 3600 + $remainingTime['minutes'] * 60 + $remainingTime['seconds'];

        return view('show.home', compact('categories', 'popularTrendProducts', 'randomProduct', 'remainingTimeInSeconds'));

    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('title', 'like', "%$query%")->get();

        return view('search.search', ['products' => $products, 'query' => $query]);
    }


    public function getRandomProduct()
    {
        // Your logic to get a new random product
        $newRandomProduct = Product::inRandomOrder()->first();// ...

    // Return a JSON response
    return response()->json($newRandomProduct);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
