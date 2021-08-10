<?php


namespace App\Models\Traits;


use App\Models\Tenant;
use App\Scopes\TenantScope;
use Illuminate\Routing\Route;

trait Tenantable
{
    protected static function boottenantable()
    {
        if (request()->path() === "api/auth/login" || request()->path() === "api/users/register") {
            return;
        }

        static::addGlobalScope(new TenantScope());

        if (!is_null(auth('api')->payload()->get("tenant_id"))) {
           static::creating(function ($model) {
                $model->tenant_id = auth('api')->payload()->get("tenant_id");

                //Setar id do usuário logado se existir campo de user_id
                if (in_array("user_id", $model->getFillable())) {
                    $model->user_id = auth("api")->user()->id;
                }
            });
        }
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}