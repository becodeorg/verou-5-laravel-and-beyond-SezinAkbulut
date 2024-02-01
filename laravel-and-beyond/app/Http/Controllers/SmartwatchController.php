<?php

namespace App\Http\Controllers;

use App\Models\Smartwatch;

class SmartwatchController extends Controller
{
    public function index()
    {
        $smartwatchs = Smartwatch::all();

        return view('categories.smartwatchs.smartwatchs', ['smartwatchs' => $smartwatchs]);
    }
    public function show($id)
    {
        $smartwatch = Smartwatch::find($id);

        return view('categories.smartwatchs.show', ['smartwatch' => $smartwatch]);
    }

    //create and store method
    public function create(Request $request)
    {
        return view('categories.smartwatchs.create_smartwatchs');
    }

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

        $smartwatch = new Smartwatch;
        $smartwatch->title = $validatedData['title'];
        $smartwatch->price = $validatedData['price'];

        // Store the image in the storage disk (public)
        $posterPath = Storage::disk('public')->put('photos', $request->file('photo'));
        // $posterPath = $request->file('photos')->store('photos');
        // dd($posterPath);

        // Update the image path in the database
        $smartwatch->photo = $posterPath;

        // Save other fields
        $smartwatch->save();
        // dd($product);

        return redirect()->route('show.home')->with('success', 'Product created successfully!');
    }

    //edit and update
    public function edit($id)
    {
        $smartwatch = Smartwatch::findOrFail($id);
        $smartwatchs = Smartwatch::all();

        return view('categories.smartwatchs.edit_smartwatchs', compact('smartwatch', 'smartwatchs'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $smartwatch = Smartwatchs::findOrFail($id);

        $smartwatch->update([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
        ]);

        // Handle photo update
        if ($request->hasFile('photo')) {
            // Delete old poster
            Storage::disk('public')->delete($smartwatch->photo);

            // Store the new photo in the storage disk
            $posterPath = Storage::disk('public')->put('photo', $request->file('photo'));

            // Update the poster path in the database
            $smartwatch->photo = $posterPath;
            $smartwatch->save();
        }

        return redirect()->route('show.home')->with('success', 'Product updated successfully!');
    }

    //delete
    public function destroy($id)
    {
        $smartwatch = Smartphone::findOrFail($id);

        // Retrieve the deleted product for display on the home page
        $deletedSmartwatch = $smartwatch->toArray();

        // Remove the product from the database
        $smartwatch->delete();

        // Check if there are deleted product in the session
        $deletedSmartwatchs = session('deletedSmartwatch', []);

        // Add the deleted product to the list
        $deletedSmartwatchs[$id] = $deletedSmartwatchs;

        // Update the movies and deleted movies in the session
        session(['deletedSmartwatchs' => $deletedSmartwatchs]);

        // Redirect to home page with success message
        return redirect()->route('show.home')->with('success', 'Products deleted successfully!');
    }

}
