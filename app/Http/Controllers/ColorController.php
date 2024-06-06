<?php

namespace App\Http\Controllers;

use App\Http\Requests\Color\StoreColor;
use App\Http\Requests\Color\UpdateColor;
use App\Http\Resources\ColorResource;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /*  Show All Color  */
    public function index()
    {
        $colors = Color::select('id', 'name')->get();
        return response()->json(['colors' => ColorResource::collection($colors)]);
    }

    /*  Store Color  */
    public function store(StoreColor $request)
    {
        $color = Color::create($request->validated());
        return response()->json(['message' => 'color Created Successfully', 'color' => new ColorResource($color)]);
    }

    /*  Update Color By Id  */
    public function update(UpdateColor $request, Color $color)
    {
        $color->update($request->validated());
        return response()->json(['message' => 'color Update Successfully', 'color' => new ColorResource($color)]);
    }

    /*  delete Color  By Id */
    public function destroy(Color $color)
    {
        $color->delete();
        return response()->json(['color' => 'color deleted successfully']);
    }


}
