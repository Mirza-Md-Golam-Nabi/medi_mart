<?php

namespace App\Services\District;

use App\Models\District;

class DistrictService
{
    public function __construct()
    {
        //
    }

    public function index(int $division_id): object
    {
        return District::where('division_id', $division_id)
            ->orderBy('name', 'asc')
            ->get();
    }

}
