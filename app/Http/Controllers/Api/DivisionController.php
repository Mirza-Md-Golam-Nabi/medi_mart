<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Division\DivisionService;
use Illuminate\Http\JsonResponse;

class DivisionController extends Controller
{
    protected $division;

    public function __construct()
    {
        $this->division = new DivisionService();
    }

    public function index(): JsonResponse
    {
        $divisions = $this->division->index();
        return formatResponse(0, 200, 'Success', $divisions);
    }
}
