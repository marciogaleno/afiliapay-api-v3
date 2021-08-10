<?php

namespace App\Models;

use App\Models\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Tenantable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "code",
        'type',
        'delivery_type',
        "name",
        "description",
        "sales_page_url",
        "image",
        "warranty",
        "email_support",
        "phone_support",
        "category_id",
        "user_id"
    ];
}
