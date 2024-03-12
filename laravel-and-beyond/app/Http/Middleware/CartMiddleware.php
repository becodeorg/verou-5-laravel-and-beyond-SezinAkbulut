<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Cart;

class CartMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!$request->session()->has('cart')) {
            $cart = new Cart();
            $request->session()->put('cart', $cart);
        }

        return $next($request);
    }
}

