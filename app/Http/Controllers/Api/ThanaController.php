<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Thana\StoreThanaRequest;
use App\Http\Requests\Thana\UpdateThanaRequest;
use App\Models\District;
use App\Models\Thana;
use App\Services\Thana\ThanaService;
use Illuminate\Http\JsonResponse;

class ThanaController extends Controller
{
    protected $thana;

    public function __construct()
    {
        $this->thana = new ThanaService();
    }

    public function index(): JsonResponse
    {
        $data = $this->thana->index();
        return $this->formatResponse(0, 200, 'Success', $data);
    }

    public function store(StoreThanaRequest $request): JsonResponse
    {
        $data = $this->thana->store($request);
        return $this->formatResponse(0, 200, 'Success', $data);
    }

    public function show(Thana $thana): JsonResponse
    {
        return $this->formatResponse(0, 200, 'Success', $thana);
    }

    public function update(UpdateThanaRequest $request, Thana $thana): JsonResponse
    {
        $this->thana->update($request, $thana);
        return $this->formatResponse(0, 200, 'Success', $thana->refresh());
    }

    public function destroy(Thana $thana): JsonResponse
    {
        $this->thana->softDelete($thana);
        return $this->index();
    }

    public function thanaList(District $district): JsonResponse
    {
        $data = $this->thana->thanaList($district->id);
        return $this->formatResponse(0, 200, 'Success', $data);
    }

}
