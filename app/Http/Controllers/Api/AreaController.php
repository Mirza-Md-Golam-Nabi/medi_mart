<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Area\StoreAreaRequest;
use App\Http\Requests\Area\UpdateAreaRequest;
use App\Models\Area;
use App\Models\Thana;
use App\Services\Area\AreaService;
use Illuminate\Http\JsonResponse;

class AreaController extends Controller
{
    protected $area;

    public function __construct()
    {
        $this->area = new AreaService();
    }

    public function index(): JsonResponse
    {
        $data = $this->area->index();
        return formatResponse(0, 200, 'Success', $data);
    }

    public function store(StoreAreaRequest $request): JsonResponse
    {
        $data = $this->area->store($request->validated());
        return formatResponse(0, 200, 'Success', $data);
    }

    public function show(Area $area): JsonResponse
    {
        return formatResponse(0, 200, 'Success', $area);
    }

    public function update(UpdateAreaRequest $request, Area $area): JsonResponse
    {
        $this->area->update($request->validated(), $area);
        return formatResponse(0, 200, 'Success', $area->refresh());
    }

    public function destroy(Area $area): JsonResponse
    {
        $this->area->softDelete($area);
        return $this->index();
    }

    public function areaList(Thana $thana): JsonResponse
    {
        $data = $this->area->areaList($thana->id);
        return formatResponse(0, 200, 'Success', $data);
    }
}
