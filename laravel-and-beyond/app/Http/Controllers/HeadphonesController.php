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
        $headphone = Headphones::find($id);

        return view('headphones.show', ['headphone' => $headphone]);
    }


    //create and store method
    public function create(Request $request)
    {
        return view('categories.headphones.create_headphones');
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

        $headphone = new Headphone;
        $headphone->title = $validatedData['title'];
        $headphone->price = $validatedData['price'];

        // Store the image in the storage disk (public)
        $posterPath = Storage::disk('public')->put('photos', $request->file('photo'));
        // $posterPath = $request->file('photos')->store('photos');
        // dd($posterPath);

        // Update the image path in the database
        $headphone->photo = $posterPath;

        // Save other fields
        $headphone->save();
        // dd($product);

        return redirect()->route('show.home')->with('success', 'Product created successfully!');
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
            'price' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $headphone = Headphones::findOrFail($id);

        $headphone->update([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
        ]);

        // Handle photo update
        if ($request->hasFile('photo')) {
            // Delete old poster
            Storage::disk('public')->delete($headphone->photo);

            // Store the new photo in the storage disk
            $posterPath = Storage::disk('public')->put('photo', $request->file('photo'));

            // Update the poster path in the database
            $headphone->photo = $posterPath;
            $headphone->save();
        }

        return redirect()->route('show.home')->with('success', 'Product updated successfully!');
    }

    //delete

    public function destroy($id)
    {
        $headphone = Headphone::findOrFail($id);

        // Retrieve the deleted product for display on the home page
        $deletedHeadphone = $headphone->toArray();

        // Remove the product from the database
        $headphone->delete();

        // Check if there are deleted product in the session
        $deletedHeadphones = session('deletedHeadphone', []);

        // Add the deleted product to the list
        $deletedHeadphones[$id] = $deletedHeadphones;

        // Update the movies and deleted movies in the session
        session(['deletedHeadphones' => $deletedHeadphones]);

        // Redirect to home page with success message
        return redirect()->route('show.home')->with('success', 'Products deleted successfully!');
    }

}
