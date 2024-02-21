<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Services\District\DistrictService;
use Illuminate\Http\JsonResponse;

class DistrictController extends Controller
{
    protected $district;

    public function __construct()
    {
        $this->district = new DistrictService();
    }

    public function index(Division $division): JsonResponse
    {
        $districts = $this->district->index($division->id);
        return $this->formatResponse(0, 200, 'Success', $districts);
    }
}
