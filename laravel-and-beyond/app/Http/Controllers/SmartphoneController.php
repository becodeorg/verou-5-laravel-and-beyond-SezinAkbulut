<?php

namespace App\Http\Controllers;

use App\Models\Smartphone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SmartphoneController extends Controller
{
    public function index()
    {
        $smartphones = Smartphone::with('category')->get();

        return view('categories.smartphones.smartphones', ['smartphones' => $smartphones]);
    }
    public function show($id)
    {
        $smartphone = Smartphone::find($id);

        return view('categories.smartphones.show', ['smartphone' => $smartphone]);
    }

    //create and store method
    public function create(Request $request)
    {
        return view('categories.smartphones.create_smartphones');
    }

    public function store(Request $request)
    {
        //dd('Store method is called.');
        // dd($request->all());

        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|exists:categories,id',
        ]);
        //dd($validatedData);

        $smartphone = new Smartphone;
        $smartphone->title = $validatedData['title'];
        $smartphone->description = $validatedData['description'];
        $smartphone->price = $validatedData['price'];
        $smartphone->category_id = $validatedData['category'];
        $smartphone->user_id = auth()->user()->id;

        // Store the image in the storage disk (public)
        $posterPath = Storage::disk('public')->put('photos', $request->file('photo'));
        // $posterPath = $request->file('photos')->store('photos');
        // dd($posterPath);

        $smartphone->photo = $posterPath;

        $smartphone->save();

        return redirect()->route('smartphones.smartphones')->with('success', 'Product created successfully!');
    }

    //edit and update
    public function edit($id)
    {
        $smartphone = Smartphone::findOrFail($id);
        $smartphones = Smartphone::all();

        return view('categories.smartphones.edit_smartphones', compact('smartphone', 'smartphones'));
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

        $smartphone = Smartphone::findOrFail($id);

        // Handle photo update
        if ($request->hasFile('photo')) {
            if ($smartphone->photo) {
                // Delete old photo
                Storage::disk('public')->delete($smartphone->photo);
            }
            // Store the new photo in the storage disk
            $posterPath = Storage::disk('public')->put('photos', $request->file('photo'));

            // Update the poster path in the database
            $smartphone->photo = $posterPath;

        }
        $smartphone->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('smartphones.smartphones')->with('success', 'Product updated successfully!');
    }

    //delete
    public function destroy($id)
    {
        $smartphone = Smartphone::findOrFail($id);

        // Retrieve the deleted product for display on the home page
        $deletedSmartphone = $smartphone->toArray();

        // Remove the product from the database
        $smartphone->delete();

        // Check if there are deleted product in the session
        $deletedSmartphones = session('deletedSmartphone', []);

        // Add the deleted product to the list
        $deletedSmartphones[$id] = $deletedSmartphones;

        // Update the movies and deleted movies in the session
        session(['deletedSmartphones' => $deletedSmartphones]);

        // Redirect to home page with success message
        return redirect()->route('smartphones.smartphones')->with('success', 'Products deleted successfully!');
    }
}
