<?php


namespace App\Repositories;


use App\Models\Tenant;

class TenantRepostitory
{
    public function create(array $data): Tenant
    {
        return Tenant::create($data);
    }
}