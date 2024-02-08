<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Headphones;
use App\Models\Smartwatch;
use App\Models\Smartphone;

class CartController extends Controller
{
    public function viewCart()
    {
        // Retrieve cart items from the session
        $cartItems = session('cart', []);

        return view('cart.view', compact('cartItems'));
    }

    public function addToCart(Request $request, $category, $productId)
    {
        // Your logic to determine the category based on the route
        $category = $request->route()->getName(); // This assumes your route names correspond to categories

        // Your logic to determine the model based on the category
        switch ($category) {
            case 'headphones':
                $product = Headphones::find($productId);
                break;
            case 'smartwatches':
                $product = Smartwatch::find($productId);
                break;
            case 'smartphones':
                $product = Smartphone::find($productId);
                break;
            default:
                // Handle unknown category
                return redirect()->back()->with('error', 'Unknown category.');
        }

        if (!$product) {
            // Handle product not found
            return redirect()->back()->with('error', 'Product not found.');
        }


        // Get the current cart from the session or create an empty array
        $cart = session('cart', []);

        // Add the product to the cart, including the category information
        $cart[] = [
            'id' => $productId,
            'category' => $category,
            'title' => $product->title,
            'price' => $product->price,
            'photo' => $product->photo,
            // Add other product details as needed
        ];

        // Store the updated cart in the session
        session(['cart' => $cart]);

        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }
}

