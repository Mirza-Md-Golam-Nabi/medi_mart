<?php

namespace App\Services\Thana;

use App\Http\Requests\Thana\StoreThanaRequest;
use App\Http\Requests\Thana\UpdateThanaRequest;
use App\Models\Thana;

class ThanaService
{
    public function __construct()
    {
        //
    }

    public function index(): object
    {
        return Thana::orderBy('name', 'asc')
            ->get();
    }

    public function store(StoreThanaRequest $request): object
    {
        return Thana::create($request->validated());
    }

    public function update(UpdateThanaRequest $request, Thana $thana): bool
    {
        return $thana->update($request->validated());
    }

    public function softDelete(Thana $thana): bool
    {
        return $thana->delete();
    }

    public function thanaList($district_id): object
    {
        return Thana::where('district_id', $district_id)
            ->orderBy('name', 'asc')
            ->get();
    }
}
