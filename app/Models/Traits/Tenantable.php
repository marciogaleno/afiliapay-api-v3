<?php


namespace App\Models\Traits;


use App\Models\Tenant;
use App\Scopes\TenantScope;
use Illuminate\Routing\Route;

trait Tenantable
{
    protected static function boottenantable()
    {
        if (request()->path() === "api/auth/login") {
            return;
        }

        static::addGlobalScope(new TenantScope());

        if (!is_null(auth('api')->payload()->get("tenant_id"))) {
           static::creating(function ($model) {
                $model->tenant_id = auth('api')->payload()->get("tenant_id");
            });
        }
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}