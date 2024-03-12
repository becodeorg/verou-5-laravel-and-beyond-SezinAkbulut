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
    public function edit($category, $product)
    {
        $category = Category::where('name', $category)->first();
        $product = Product::findOrFail($product);

        return view('products.edit', compact('category', 'product'));
    }
*/
    public function edit($category, $productId)
    {
        // Find the product by its ID
        $product = Product::findOrFail($productId);

        // Find the category by its name
        $category = Category::where('name', $category)->first();

        // If the product or category doesn't exist, handle it accordingly
        if (!$product || !$category) {
            return redirect()->route('categories.index')->with('error', 'Product or category not found.');
        }

        return view('products.edit', compact('product', 'category'));
    }



    public function update(Request $request, $category, $product)
    {
        $category = Category::where('name', $category)->first();
        $product = Product::findOrFail($product);

        $validatedData = $request->validate([
            'title' => 'required',
            'price' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product->title = $validatedData['title'];
        $product->price = $validatedData['price'];

        // Update the product's photo if a new one is provided
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($product->photo) {
                Storage::disk('public')->delete($product->photo);
            }

            // Store the new photo
            $posterPath = Storage::disk('public')->put('photos', $request->file('photo'));
            $product->photo = $posterPath;
        }

        // Save the changes
        $product->save();

        return redirect()->route('products.show', ['category' => $category->name])->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($category, $product)
    {
        $category = Category::where('name', $category)->first();
        $product = Product::findOrFail($product);

        // Delete the product's photo if it exists
        if ($product->photo) {
            Storage::disk('public')->delete($product->photo);
        }

        // Delete the product
        $product->delete();

        return redirect()->route('products.show', ['category' => $category->name])->with('success', 'Product deleted successfully.');
    }

   //Search method
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('title', 'like', "%$query%")->get();

        return view('search.search', ['products' => $products, 'query' => $query]);
    }


    public function details($category, $productId)
    {
        // Find the product by its ID
        $product = Product::findOrFail($productId);

        // Find the category by its name
        $category = Category::where('name', $category)->first();

        // If the product or category doesn't exist, handle it accordingly
        if (!$product || !$category) {
            return redirect()->route('categories.show', ['category' => $category])->with('error', 'Product or category not found.');

        }

        return view('products.details', compact('product', 'category'));
    }
/*
    public function show(Category $category, Product $product) {
        return view('products.show', compact('category', 'product'));
    }
*/



}
