<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategory;
use App\Http\Requests\Category\UpdateCategory;
use App\Http\Requests\StoreSubCategory;
use App\Http\Requests\UpdateSubCategory;
use App\Http\Resources\ProductCategoryResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SubcategoryResource;
use App\Models\Subcategory;
use Illuminate\Support\Arr;

class SubcategoryController extends Controller
{
    /*  Show All Categories  */
    public function index()
    {
        $subcategories = Subcategory::select('id', 'name', 'description','category_id')->get();
        return response()->json(['subCategories' => SubcategoryResource::collection($subcategories)]);
    }

    /*  Store Category  */
    public function store(StoreSubCategory $request)
    {
        $subcategory = Subcategory::create(Arr::except($request->validated(), ['images']));
        uploadImage($request['images'], $subcategory, 'subCategoryImages');
        return response()->json(['message' => 'Subcategory Created Successfully', 'subCategory' => new SubcategoryResource($subcategory)]);
    }

    /*  Update Category By Id  */
    public function update(UpdateSubCategory $request, $id)
    {
        $subcategory=Subcategory::find($id);
        $subcategory->update(Arr::except($request->validated(), 'images'));
        if ($request['image']) {
            updateImage($request['images'], $subcategory, 'subCategoryImages');
        }
        return response()->json(['message' => 'Subcategory Update Successfully', 'Subcategory' => new SubcategoryResource($subcategory)]);
    }


    /*  show Products from Category By Id  */
    public function show(Subcategory $subcategory)
    {
        return response()->json(['SubCategoryProduct' => ProductResource::collection($subcategory->products)]);
    }

    /*  delete Category  By Id */
    public function destroy($subcategory)
    {
        $subcategory= Subcategory::find($subcategory);
        $subcategory->delete();
        return response()->json(['message' => 'Subcategory deleted successfully']);
    }
}
