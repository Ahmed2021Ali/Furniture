<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate(['comment' => ['required', 'max:255']]);
        $user = $request->user();
        Comment::create(['user_id' => $user->id, 'product_id' => $product->id, 'comment' => $request->comment]);
        return response()->json(['message' => 'Your comment on our product has been successfully saved']);
    }

    public function show(Product $product)
    {
        return response()->json(['products' =>new ProductResource($product)]);
    }
}
