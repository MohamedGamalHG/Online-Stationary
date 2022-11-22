<?php


namespace App\Repository;


use App\OnlineStationary\Product\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{

    public function index()
    {
        $product = Product::all();
        return view('Admin.product.index',compact('product'));
    }

    public function store($request)
    {
        // TODO: Implement store() method.
    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function delete($request)
    {
        // TODO: Implement delete() method.
    }
}
