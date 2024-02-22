<?php

namespace App\Services\Type;

use App\Models\Type;

class TypeService
{
    public function __construct()
    {
        //
    }

    public function index(): object
    {
        return Type::orderBy('title', 'asc')
            ->get();
    }

    public function store(array $data): object
    {
        return Type::create($data);
    }

    public function update(array $data, Type $type): bool
    {
        return $type->update($data);
    }

    public function softDelete(Type $type): bool
    {
        return $type->delete();
    }
}
