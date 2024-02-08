<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $products = Product::with('category', 'user')->get();

        // Filter popular trend products
         $popularTrendProducts = $products->where('popular_trend', true);

        return view('show.home', compact('products', /*'popularTrendProducts'*/));
    }

    public function show($category)
    {
        // Find the category by its name
        $category = Category::where('name', $category)->first();

        // If the category doesn't exist, handle it accordingly
        if (!$category) {
            return redirect()->route('categories.index')->with('error', 'Category not found.');
        }

        // Retrieve all products associated with the category
        $products = Product::where('category_id', $category->id)->get();

        // Pass the products and category to the view
        return view('products.show', compact('products', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($category)
    {
        // Find the category by its name
        $category = Category::where('name', $category)->first();

        // If the category doesn't exist, handle it accordingly
        if (!$category) {
            return redirect()->route('categories.index')->with('error', 'Category not found.');
        }

        return view('products.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request, $category)
    {
        // Find the category by its name
        $category = Category::where('name', $category)->first();

        // If the category doesn't exist, handle it accordingly
        if (!$category) {
            return redirect()->route('categories.index')->with('error', 'Category not found.');
        }

        $validatedData = $request->validate([
            'title' => 'required',
            'price' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = new Product;
        $product->title = $validatedData['title'];
        $product->price = $validatedData['price'];
        $product->user_id = auth()->user()->id;
        $product->category_id = $category->id;

        // Store the image in the storage disk (public)
        $photoPath = Storage::disk('public')->put('photos', $request->file('photo'));
        $product->photo = $photoPath;

        // Save other fields
        $product->save();

        // Redirect to the store confirmation page
        return view('products.store', compact('product', 'category'));
    }




    /*
        public function storeConfirmation($category)
        {



    // Find the category by its name
            $category = Category::where('name', $category)->first();

    // If the category doesn't exist, handle it accordingly
            if (!$category) {
                return redirect()->route('categories.index')->with('error', 'Category not found.');
            }

            return view('products.store', compact('category'));
        }
    */

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

        // Update product based on $id
        $product = Product::findOrFail($id);

        // Update fields
        $product->update([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
        ]);

        // Handle photo update
        if ($request->hasFile('photo')) {
            // Delete old photo if it exists
            if ($product->photo) {
                Storage::disk('public')->delete($product->photo);
            }

            // Store the new photo in the storage disk
            $posterPath = Storage::disk('public')->put('photo', $request->file('photo'));

            // Update the photo path in the database
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
        $deletedProducts = session('deletedProduct', []);

        // Add the deleted product to the list
        $deletedProducts[$id] = $deletedProducts;

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

/*
    public function show(Category $category, Product $product) {
        return view('products.show', compact('category', 'product'));
    }
*/



}
