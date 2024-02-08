<?php
namespace App\Http\Controllers;

use App\Models\Headphones;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeadphonesController extends Controller
{
    public function index()
    {
        $headphones = Headphones::with('category')->get();

        return view('categories.headphones.headphones', ['headphones' => $headphones]);
    }

    public function show($id)
    {
        $headphone = Headphones::find($id);

        return view('categories.headphones.show', ['headphone' => $headphone]);
    }


    //create and store method
    public function create(Request $request)
    {
        // Example: Get the current category based on some condition
        $currentCategory = Category::where('name', 'Headphones')->first();
        // Pass other variables if needed
        $otherVariables = // Your other variables here...
        $categories = Category::all();

        return view('categories.headphones.create_headphones', compact('currentCategory', 'categories', 'otherVariables'));
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|exists:categories,id',
        ]);
        \Log::info($request->all());

        $headphone = new Headphones;
        $headphone->title = $validatedData['title'];
        $headphone->description = $validatedData['description'];
        $headphone->price = $validatedData['price'];
        $headphone->category_id = $validatedData['category'];
        $headphone->user_id = auth()->user()->id;


        // Store the image in the storage disk (public)
        $posterPath = Storage::disk('public')->put('photos', $request->file('photo'));

        // Update the image path in the database
        $headphone->photo = $posterPath;

        // Save other fields
        $headphone->save();

        return redirect()->route('headphones.headphones')->with('success', 'Product created successfully!');
    }

    //edit and update
    public function edit($id)
    {
        $headphone = Headphones::findOrFail($id);
        $headphones = Headphones::all();

        return view('categories.headphones.edit_headphones', compact('headphone', 'headphones'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $headphone = Headphones::findOrFail($id);

        // Handle photo update
        if ($request->hasFile('photo')) {
            // Check if the headphone has a photo
            if ($headphone->photo) {
                // Delete old photo
                Storage::disk('public')->delete($headphone->photo);
            }

            // Store the new photo in the storage disk
            $posterPath = Storage::disk('public')->put('photos', $request->file('photo'));

            // Update the photo path in the database
            $headphone->photo = $posterPath;
        }

        // Update other fields
        $headphone->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('headphones.headphones')->with('success', 'Product updated successfully!');
    }

    //delete

    public function destroy($id)
    {
        $headphone = Headphones::findOrFail($id);

        // Retrieve the deleted product for display on the home page
        $deletedHeadphone = $headphone->toArray();

        // Remove the product from the database
        $headphone->delete();

        // Check if there are deleted product in the session
        $deletedHeadphones = session('deletedHeadphone', []);

        // Add the deleted product to the list
        $deletedHeadphones[$id] = $deletedHeadphone;

        // Update the movies and deleted movies in the session
        session(['deletedHeadphones' => $deletedHeadphones]);

        // Redirect to home page with success message
        return redirect()->route('headphones.headphones')->with('success', 'Products deleted successfully!');
    }


    //add to cart
    /*
    public function addToCart(Request $request, $productId)
    {
        $product = Headphones::find($productId);

        if (!$product) {
            // Handle product not found
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Get the current cart from the session or create an empty array
        $cart = session('cart', []);

        // Add the product to the cart
        $cart[$productId] = [
            'id' => $product->id,
            'title' => $product->title,
            'price' => $product->price,
            // Add other product details as needed
        ];

        // Store the updated cart in the session
        session(['cart' => $cart]);

        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }
*/
}
