<?php

namespace App\Services\Thana;

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

    public function store(array $data): object
    {
        return Thana::create($data);
    }

    public function update(array $data, Thana $thana): bool
    {
        return $thana->update($data);
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
