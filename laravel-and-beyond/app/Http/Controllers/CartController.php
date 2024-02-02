<?php
namespace App\Http\Controllers;

    use App\Models\Cart;
    use Illuminate\Http\Request;

class CartController extends Controller
{
    // Function to display the cart items
    public function index()
    {
        // Retrieve the cart items for the authenticated user (assuming you have authentication)
        $cartItems = auth()->user()->cartItems;

        return view('cart.index', compact('cartItems'));
    }

    public function showCart()
    {
        if (auth()->check()) {
            $cartItems = auth()->user()->cartItems;
            return view('cart.show', compact('cartItems'));
        } else {
            // Handle the case when the user is not authenticated
            return redirect()->route('login')->with('error', 'Please log in to view your cart.');
        }
    }

    // Function to add a product to the cart
    public function addToCart(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_id' => 'required',
            'product_type' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        // Add the product to the cart
        auth()->user()->cartItems()->create([
            'product_id' => $request->input('product_id'),
            'product_type' => $request->input('product_type'),
            'quantity' => $request->input('quantity'),
        ]);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // Function to remove a product from the cart
    public function removeFromCart($id)
    {
        // Find the cart item and delete it
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('cart.show')->with('success', 'Product removed from cart successfully!.');
    }


}

