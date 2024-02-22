<?php

namespace App\Http\Controllers\Api;

use App\Models\Type;
use Illuminate\Http\JsonResponse;
use App\Services\Type\TypeService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Type\StoreTypeRequest;
use App\Http\Requests\Type\UpdateTypeRequest;

class TypeController extends Controller
{
    protected $type;

    public function __construct()
    {
        $this->type = new TypeService();
    }

    public function index(): JsonResponse
    {
        $types = $this->type->index();
        return formatResponse(0, 200, 'Success', $types);
    }

    public function store(StoreTypeRequest $request): JsonResponse
    {
        $type = $this->type->store($request->validated());
        return formatResponse(0, 200, 'Success', $type);
    }

    public function show(Type $type): JsonResponse
    {
        return formatResponse(0, 200, 'Success', $type);
    }

    public function update(UpdateTypeRequest $request, Type $type): JsonResponse
    {
        $this->type->update($request->validated(), $type);
        return formatResponse(0, 200, 'Success', $type->refresh());
    }

    public function destroy(Type $type): JsonResponse
    {
        $this->type->softDelete($type);
        return $this->index();
    }
}
