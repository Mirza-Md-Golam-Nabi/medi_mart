<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\StoreSubCategoryRequest;
use App\Http\Requests\SubCategory\UpdateSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Services\SubCategory\SubCategoryService;
use Illuminate\Http\JsonResponse;

class SubCategoryController extends Controller
{
    protected $sub_category;

    public function __construct()
    {
        $this->sub_category = new SubCategoryService();
    }

    public function index(): JsonResponse
    {
        $sub_categories = $this->sub_category->index();
        return formatResponse(0, 200, 'Success', $sub_categories);
    }

    public function store(StoreSubCategoryRequest $request): JsonResponse
    {
        $sub_category = $this->sub_category->store($request->validated());
        return formatResponse(0, 200, 'Success', $sub_category);
    }

    public function show(SubCategory $subcategory): JsonResponse
    {
        return formatResponse(0, 200, 'Success', $subcategory);
    }

    public function update(UpdateSubCategoryRequest $request, SubCategory $subcategory): JsonResponse
    {
        $this->sub_category->update($request->validated(), $subcategory);
        return formatResponse(0, 200, 'Success', $subcategory->refresh());
    }

    public function destroy(SubCategory $subcategory): JsonResponse
    {
        $this->sub_category->softDelete($subcategory);
        return $this->index();
    }

    public function subcategoryList(Category $category): JsonResponse
    {
        $data = $this->sub_category->subcategoryList($category->id);
        return formatResponse(0, 200, 'Success', $data);
    }
}
