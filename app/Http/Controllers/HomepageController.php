<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Http\Resources\SubcategoryResource;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function offers()
    {
        $offers = Product::where('offer', '!=', null)->get();
        return response()->json(['offers' => ProductResource::collection($offers)]);
    }
    public function subCategories()
    {
        $subCategories = Subcategory::take(3)->get();
        return response()->json(['subCategories' => SubcategoryResource::collection($subCategories)]);
    }
    public function subCategoryProducts(Subcategory $subCategory)
    {
        return response()->json(['products' =>  ProductResource::collection($subCategory->products)]);
    }

    public function product(Product $product)
    {
        return response()->json(['product' => new ProductResource($product)]);
    }
}
