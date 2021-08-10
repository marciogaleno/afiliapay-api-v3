<?php


namespace App\Services\Portal;


use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductService
{
    private ProductRepository $repository;

    function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data): Product
    {
        return $this->repository->create($data);
    }

    public function update(array $data, int $id): Product
    {
        return $this->repository->update($data, $id);
    }
}