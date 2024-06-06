<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate(['review' => ['required', 'numeric', 'min:1', 'max:5']]);
        $user = $request->user();
        $review = Review::where('product_id', $product->id)->where('user_id', $user->id)->first();
        if ($review) {
            return response()->json(['message' => 'The product is already in your review.']);
        }
        Review::create(['user_id' => $user->id, 'product_id' => $product->id, 'review' => $request->review]);
        return response()->json(['message' => 'Your review on our product has been successfully saved']);
    }

    public function show(Product $product)
    {
        $totalRating1 = $product->reviews->where('review', 1)->count();
        $totalRating2 = $product->reviews->where('review', 2)->count();
        $totalRating3 = $product->reviews->where('review', 3)->count();
        $totalRating4 = $product->reviews->where('review', 4)->count();
        $totalRating5 = $product->reviews->where('review', 5)->count();
        $totalRating = $product->reviews->count();
        if ($totalRating > 0) {
            $review = ($totalRating1 * 1 + $totalRating2 * 2 + $totalRating3 * 3 + $totalRating4 * 4 + $totalRating5 * 5) / $totalRating;
        }
        return response()->json(['review' => $review]);
    }
}
