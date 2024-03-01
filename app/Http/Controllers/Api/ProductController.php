<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use App\Models\SubCategory;
use App\Services\Product\ProductService;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    protected $product;

    public function __construct()
    {
        $this->product = new ProductService();
    }

    public function index(): JsonResponse
    {
        $product = $this->product->index();
        return formatResponse(0, 200, 'Success', $product);
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        $image_name = null;
        if ($request->hasFile('image')) {
            $path = $this->product->productImagePathCreate($request->validated());

            $image_name = $this->product->imageStore($request->image, $path);
        }

        $product = $this->product->store(['image' => $image_name] + $request->validated());
        return formatResponse(0, 200, 'Success', $product);
    }

    public function show(Product $product): JsonResponse
    {
        return formatResponse(0, 200, 'Success', $product);
    }

    public function update(UpdateProductRequest $request, Product $product): JsonResponse
    {
        $image_name = $product->image;
        $validated_data = $request->validated();

        if ($request->hasFile('image')) {
            $delete_image_path = $this->product->productImagePathCreate($product->toArray());
            $this->product->imageDelete($image_name, $delete_image_path);

            $store_image_path = $this->product->productImagePathCreate($validated_data);
            $image_name = $this->product->imageStore($request->image, $store_image_path);
        }

        $this->product->update(['image' => $image_name] + $validated_data, $product);
        return formatResponse(0, 200, 'Success', $product->refresh());
    }

    public function destroy(Product $product): JsonResponse
    {
        $this->product->softDelete($product);
        return $this->index();
    }

    public function productList(SubCategory $sub_category): JsonResponse
    {
        $data = $this->product->productList($sub_category->id);
        return formatResponse(0, 200, 'Success', $data);
    }
}
