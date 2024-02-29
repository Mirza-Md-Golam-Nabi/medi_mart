<?php

namespace App\Services\SubCategory;

use App\Models\SubCategory;

class SubCategoryService
{
    public function __construct()
    {
        //
    }

    public function index(): object
    {
        return SubCategory::orderBy('title', 'asc')
            ->get();
    }

    public function store(array $data): object
    {
        return SubCategory::create($data);
    }

    public function update(array $data, SubCategory $subcategory): bool
    {
        return $subcategory->update($data);
    }

    public function softDelete(SubCategory $subcategory): bool
    {
        return $subcategory->delete();
    }

    public function subCategoryList($category_id): object
    {
        return SubCategory::where('category_id', $category_id)
            ->orderBy('title', 'asc')
            ->get();
    }
}
