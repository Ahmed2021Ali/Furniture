<?php

namespace App\Http\Controllers;

use App\Http\Requests\Size\StoreSize;
use App\Http\Requests\Size\UpdateSize;
use App\Http\Resources\SizeResource;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /*  Show All Size  */
    public function index()
    {
        $sizes = Size::select('id', 'name')->get();
        return response()->json(['sizes' => SizeResource::collection($sizes)]);
    }

    /*  Store Size  */
    public function store(StoreSize $request)
    {
        $size = Size::create($request->validated());
        return response()->json(['message' => 'Size Created Successfully', 'Size' => new SizeResource($size)]);
    }

    /*  Update Size By Id  */
    public function update(UpdateSize $request, Size $size)
    {
        $size->update($request->validated());
        return response()->json(['message' => 'Size Update Successfully', 'Size' => new SizeResource($size)]);
    }

    /*  delete Size  By Id */
    public function destroy(Size $size)
    {
        $size->delete();
        return response()->json(['message' => 'Size deleted successfully']);
    }

}
