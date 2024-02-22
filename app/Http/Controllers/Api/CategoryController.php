<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\Category\CategoryService;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    protected $category;

    public function __construct()
    {
        $this->category = new CategoryService();
    }

    public function index(): JsonResponse
    {
        $categories = $this->category->index();
        return formatResponse(0, 200, 'Success', $categories);
    }

    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $category = $this->category->store($request->validated());
        return formatResponse(0, 200, 'Success', $category);
    }

    public function show(Category $category): JsonResponse
    {
        return formatResponse(0, 200, 'Success', $category);
    }

    public function update(UpdateCategoryRequest $request, Category $category): JsonResponse
    {
        $this->category->update($request->validated(), $category);
        return formatResponse(0, 200, 'Success', $category->refresh());
    }

    public function destroy(Category $category): JsonResponse
    {
        $this->category->softDelete($category);
        return $this->index();
    }
}
