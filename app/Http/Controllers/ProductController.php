<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\QuentityProduct;
use App\Http\Requests\Product\StoreProduct;
use App\Http\Requests\Product\UpdateProduct;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json(['products' => ProductResource::collection($products)]);
    }

    public function store(StoreProduct $request)
    {
        //dd($request->validated());
        $product = Product::create([
            ...Arr::except($request->validated(), ['images']),
            'price_after_offer' => $request['offer'] ? priceAfterOffer($request['price'], $request['offer']) : null
        ]);
       // dd($product);
        uploadImage($request['images'], $product, 'productImages');
        if (isset($request['colors_id'])) {
            foreach ($request['colors_id'] as $id) {
                $product->colors()->attach($id);
            }
        }
        if (isset($request['sizes_id'])) {
            foreach ($request['sizes_id'] as $id) {
                $product->sizes()->attach($id);
            }
        }
        return response()->json(['message' => 'product created successfully', 'product' => new ProductResource($product)]);
    }

    public function update(UpdateProduct $request, Product $product)
    {
        //dd($request->validated());
        $product->update([
            ...Arr::except($request->validated(), ['images', 'colors_id', 'sizes_id']),
            'price_after_offer' => $request['offer'] ? priceAfterOffer($request['price'], $request['offer']) : $product->price_after_offer
        ]);
        if (isset($request['images'])) {
            updateImage($request['images'], $product, 'productImages');
        }
        if (isset($request['colors_id'])) {
            foreach ($request['colors_id'] as $id) {
                $product->colors()->sync($id);

            }
        }
        if (isset($request['sizes_id'])) {
            foreach ($request['sizes_id'] as $id) {
                $product->sizes()->sync($id);
            }
        }
        return response()->json(['message' => 'product Updated successfully', 'product' => new ProductResource($product)]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'product Deleted successfully']);
    }

}
