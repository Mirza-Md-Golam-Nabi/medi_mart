<?php

namespace App\Services\Division;

use App\Models\Division;

class DivisionService
{
    public function __construct()
    {
        //
    }

    public function index(): object
    {
        return Division::orderBy('name', 'asc')
            ->get();
    }

}
