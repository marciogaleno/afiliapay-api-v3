<?php


namespace App\Scopes;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        if (!is_null(auth('api')->payload()->get("tenant_id"))) {
            $builder->where("tenant_id", auth('api')->payload()->get("tenant_id"));
        }
    }
}