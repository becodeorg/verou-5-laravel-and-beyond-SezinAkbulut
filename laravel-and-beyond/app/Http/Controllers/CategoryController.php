<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use App\Models\Category;
use App\Models\Headphones;
use App\Models\Smartwatch;
use App\Models\Smartphone;
use Illuminate\Http\Request;


class CategoryController extends Controller {

    public function index()
    {
        $categories = Category::with('user')->get();

        return view('categories.index', compact('categories'));
    }

    public function show(Category $category) {
        $products = $category->products;
        return view('categories.show', ['category' => $category], compact('category', 'products'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // Validation rules for category creation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create a new category
        $category = new Category;
        $category->name = $validatedData['name'];
        $category->user_id = auth()->user()->id;

        // Store the category photo in the storage disk
        if ($request->hasFile('photo')) {
            $photoPath = Storage::disk('public')->put('category_photos', $request->file('photo'));
            $category->photo = $photoPath;
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        // Validation rules for category update
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update category details
        $category->name = $validatedData['name'];

        // Update the category photo in the storage disk
        if ($request->hasFile('photo')) {
            // Delete the old photo
            if ($category->photo) {
                Storage::disk('public')->delete($category->photo);
            }

            // Store the new photo
            $photoPath = Storage::disk('public')->put('category_photos', $request->file('photo'));
            $category->photo = $photoPath;
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Perform the delete action
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }



    public function showHeadphones(Headphones $category)
    {
        $categoryWithProducts = $category->load('product');

        return view('categories.show', compact('categoryWithProducts'));
    }
    public function showSmarphones(Smartphone $category)
    {
        $categoryWithProducts = $category->load('product');

        return view('categories.show', compact('categoryWithProducts'));
    }

    public function showSmartphones(Smartwatch $category)
    {
        $categoryWithProducts = $category->load('product');

        return view('categories.show', compact('categoryWithProducts'));
    }

    /*
   public function show(Category $category)
   {
       $categoryWithProducts = $category->load('products');

       return view('categories.show', compact('categoryWithProducts'));
   }
*/

/*
    public function show(Category $category)
    {
        $categoryWithProducts = $category->load('products');

        return view('categories.show', compact('categoryWithProducts'));
    }
    */
/*
    public function show(Category $category)
    {
        // Assuming you have a single categories table
        $category = Category::find();

        // Load the products relationship
        $products = $category->load('products');

        return view('categories.show', ['category' => $category], compact('products'));
    }
*/
}
