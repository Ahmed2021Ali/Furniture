<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategory;
use App\Http\Requests\Category\UpdateCategory;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SubcategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    /*  Show All Categories  */
    public function index()
    {
        $categories = Category::select('id', 'name')->get();
        return response()->json(['Categories' => CategoryResource::collection($categories)]);
    }

    /*  Store Category  */
    public function store(StoreCategory $request)
    {
        $category = Category::create($request->validated());
        uploadImage($request['images'], $category, 'categoryImages');
        return response()->json(['message' => 'Category Created Successfully', 'Category' => new CategoryResource($category)]);
    }

    /*  Update Category By Id  */
    public function update(UpdateCategory $request, Category $category)
    {
        $category->update($request->validated());
        if ($request['images']) {
            updateImage($request['images'], $category, 'categoryImages');
        }
        return response()->json(['message' => 'Category Update Successfully', 'Category' => new CategoryResource($category)]);
    }


    /*  show SubCategories from Category By Id  */
    public function show(Category $category)
    {
        return response()->json(['Category' => SubcategoryResource::collection($category->subCategories)]);
    }

    /*  delete Category  By Id */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
