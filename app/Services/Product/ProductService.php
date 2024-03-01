<?php

namespace App\Services\Product;

use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function __construct()
    {
        //
    }

    public function index(): object
    {
        return Product::orderBy('name', 'asc')
            ->get();
    }

    public function store(array $data): object
    {
        return Product::create($data);
    }

    public function update(array $data, Product $product): bool
    {
        return $product->update($data);
    }

    public function softDelete(Product $product): bool
    {
        return $product->delete();
    }

    public function productList($subcategory_id): object
    {
        return Product::where('sub_category_id', $subcategory_id)
            ->orderBy('name', 'asc')
            ->get();
    }

    public function productImagePathCreate(array $request): string
    {
        try {
            $path = 'type_' . $request['type_id'] .
                '/cat_' . $request['category_id'] .
                '/subcat_' . $request['sub_category_id'];

        } catch (Exception $e) {
            throw new Exception('Path does not create. ' . $e->getMessage());
        }

        return $path;
    }

    public function imageStore($image, string $path): string
    {
        $extension = $image->extension();
        $name = time() . '.' . $extension;

        $full_path = $path . '/' . $name;

        Storage::disk('product_image')->put($full_path, file_get_contents($image));

        return $name;
    }

    public function imageDelete(?string $image_name, string $path): void
    {
        $file = $path . '/' . $image_name;
        $image_path = Storage::disk("product_image")->url($file);

        if (File::exists($image_path)) {
            File::delete($image_path);
        }
    }
}
