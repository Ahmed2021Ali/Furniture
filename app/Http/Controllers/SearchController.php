<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;
        $products = Product::where(function ($q) use ($search) {
            $q->where('name', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
        })->get();
        if (isset($products)) {
            return response()->json(['products' => ProductResource::collection($products)]);
        }
        return response()->json(['message' => 'There are no products in this search']);
    }
}
