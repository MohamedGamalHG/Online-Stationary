<?php


namespace App\Repository;


use App\OnlineStationary\Product\Models\Filter;

class FilterRepository implements FilterRepositoryInterface
{

    public function index()
    {
       $filter = Filter::all();
       return view('Admin.filter.index',compact('filter'));
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
