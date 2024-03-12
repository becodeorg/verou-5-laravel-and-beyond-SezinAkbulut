<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{


    public function index()
    {
        // Retrieve cart items
        $cartItems = Cart::content();

        // Calculate total price
        $total = Cart::subtotal();

        // Retrieve cart count from session
        $cartItemsCount = Session::get('cartItemsCount', 0);

        return view('cart.index', compact('cartItems', 'total', 'cartItemsCount'));
    }



    public function show()
    {
        $cartItems = Cart::content();
        $totalPriceExcludingTax = Cart::subtotal();

        return view('cart.show', compact('cartItems', 'totalPriceExcludingTax'));
    }

    public function addToCart(Request $request, Product $product)
    {
        $quantity = $request->input('quantity', 1);
        $productDetails = Product::findOrFail($product->id);

        Cart::add([
            'id' => $productDetails->id,
            'name' => $productDetails->title,
            'price' => $productDetails->price,
            'qty' => $quantity,
            'options' => [
                'photo' => $productDetails->photo,
                'category' => $productDetails->category->name,
            ],
        ]);

        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    public function removeFromCart($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }

    public function checkout()
    {
        Cart::destroy();
        return redirect()->route('cart.index')->with('success', 'Checkout successful. Your cart is now empty.');
    }

    public function update(Request $request, $rowId)
    {
        Cart::update($rowId, $request->quantity);

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }
}
