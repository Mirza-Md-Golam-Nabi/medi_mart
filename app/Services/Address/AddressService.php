<?php

namespace App\Services\Address;

use App\Models\Address;

class AddressService
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        //
    }

    public function store(array $data): object
    {
        return Address::create($data);
    }

    public function update(array $data, Address $address): bool
    {
        return $address->update($data);
    }
}
