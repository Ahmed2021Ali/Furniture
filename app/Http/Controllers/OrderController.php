<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Product $product, Request $request)
    {
        $user = $request->user();
        Order::create(['user_id' => $user->id, 'product_id' => $product->id]);
        return response()->json(['message' => 'Your comment on our product has been successfully saved']);
    }
    public function show(Request $request)
    {
        $user = $request->user();
        return response()->json(['products' => OrderResource::collection($user->orders)]);

    }
}
