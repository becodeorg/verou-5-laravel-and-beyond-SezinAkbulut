<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('show.home', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd('Store method is called.');
       // dd($request->all());

        $validatedData = $request->validate([
            'title' => 'required',
            'price' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //dd($validatedData);

        $product = new Product;
        $product->title = $validatedData['title'];
        $product->price = $validatedData['price'];

        // Store the image in the storage disk (public)
        $posterPath = Storage::disk('public')->put('photos', $request->file('photo'));
        // $posterPath = $request->file('photos')->store('photos');
       // dd($posterPath);

        // Update the image path in the database
        $product->photo = $posterPath;

        // Save other fields
        $product->save();
       // dd($product);

        return redirect()->route('show.home')->with('success', 'Product created successfully!');
    }


    /**
     * Show the product for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $products = Product::all();

        return view('crud.edit', compact('product', 'products'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update movie based on $id
        $product = Product::findOrFail($id);

        // Update fields
        $product->update([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
        ]);

        // Handle photo update
        if ($request->hasFile('photo')) {
            // Delete old poster
            Storage::disk('public')->delete($product->photo);

            // Store the new photo in the storage disk
            $posterPath = Storage::disk('public')->put('photo', $request->file('photo'));

            // Update the poster path in the database
            $product->photo = $posterPath;
            $product->save();
        }

        return redirect()->route('show.home')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Retrieve the deleted product for display on the home page
        $deletedMovie = $product->toArray();

        // Remove the product from the database
        $product->delete();

        // Check if there are deleted product in the session
        $deletedMovies = session('deletedProduct', []);

        // Add the deleted product to the list
        $deletedProducts[$id] = $deletedProduct;

        // Update the movies and deleted movies in the session
        session(['deletedProducts' => $deletedProducts]);

        // Redirect to home page with success message
        return redirect()->route('show.home')->with('success', 'Products deleted successfully!');
    }

   //Search method
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('title', 'like', "%$query%")->get();

        return view('search.search', ['products' => $products, 'query' => $query]);
    }

    //Show details
    public function showDetails($id)
    {
        $product = Product::find($id);

        return view('details.details', ['product' => $product]);
    }

}
