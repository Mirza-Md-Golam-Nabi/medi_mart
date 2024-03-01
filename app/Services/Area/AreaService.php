<?php

namespace App\Services\Area;

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

    public function store(array $data): object
    {
        return Area::create($data);
    }

    public function update(array $data, Area $area): bool
    {
        return $area->update($data);
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
