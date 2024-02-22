<?php

namespace App\Services\Category;

use App\Models\Category;


class CategoryService
{
    public function __construct()
    {
        //
    }

    public function index(): object
    {
        return Category::orderBy('title', 'asc')
            ->get();
    }

    public function store(array $data): object
    {
        return Category::create($data);
    }

    public function update(array $data, Category $area): bool
    {
        return $area->update($data);
    }

    public function softDelete(Category $category): bool
    {
        return $category->delete();
    }

    public function categoryList($type_id): object
    {
        return Category::where('type_id', $type_id)
            ->orderBy('title', 'asc')
            ->get();
    }
}
