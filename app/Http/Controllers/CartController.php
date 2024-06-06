<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index(Request $request)
    {
        $carts = $request->user()->carts;
        if (isset($carts)) {
           // dd($carts);
            return response()->json(['carts' => CartResource::collection($carts)]);
        }
        return response()->json(['message' => 'There are no products in your shopping cart']);
    }

    public function store(Product $product, Request $request)
    {
        $user = $request->user();
        $cart = Cart::where('product_id', $product->id)->where('user_id', $user->id)->first();
        if ($cart) {
            return response()->json(['message' => 'The product is already in your shopping cart']);
        }
        Cart::create(['user_id' => $user->id, 'product_id' => $product->id]);
        return response()->json(['message' => 'The product has been successfully added to your shopping cart']);
    }

}
