<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\Portal\ProductService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProductsController extends Controller
{
    private ProductService $service;

    public function __construct(ProductService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function create(ProductRequest $request)
    {
       return $this->service->create($request->all());
    }

    public function update(ProductRequest $request, int $id)
    {
       return $this->service->update($request->all(), $id);
    }
}
