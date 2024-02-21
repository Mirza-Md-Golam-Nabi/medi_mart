<?php

namespace App\Services\Area;

use App\Http\Requests\Area\StoreAreaRequest;
use App\Http\Requests\Area\UpdateAreaRequest;
use App\Models\Area;

class AreaService
{
    public function __construct()
    {
        //
    }

    public function index(): object
    {
        return Area::orderBy('name', 'asc')
            ->get();
    }

    public function store(StoreAreaRequest $request): object
    {
        return Area::create($request->validated());
    }

    public function update(UpdateAreaRequest $request, Area $area): bool
    {
        return $area->update($request->validated());
    }

    public function softDelete(Area $area): bool
    {
        return $area->delete();
    }

    public function areaList($thana_id): object
    {
        return Area::where('thana_id', $thana_id)
            ->orderBy('name', 'asc')
            ->get();
    }
}
