<?php


namespace App\Repositories;


use App\Models\Product;
use Illuminate\Support\Str;

class ProductRepository
{

    public function create(array $data): Product
    {
        $data["code"] = (string) Str::uuid();
        return Product::create($data);
    }

    public function update(array $data, $id): Product
    {
        $product = Product::find($id);
        $product->fill($data)->save();
        return $product;
    }
}