<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Headphones;
use App\Models\Smartwatch;
use App\Models\Smartphone;
use Illuminate\Http\Request;


class CategoryController extends Controller {
 public function show(Category $category) {
        $products = $category->products;
        return view('categories.show', ['category' => $category], compact('category', 'products'));
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
