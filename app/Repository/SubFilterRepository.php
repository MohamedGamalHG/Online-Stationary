<?php


namespace App\Repository;


use App\OnlineStationary\Product\Models\Filter;
use App\OnlineStationary\Product\Models\SubFilter;

class SubFilterRepository implements SubFilterRepositoryInterface
{

    public function index()
    {
        $subfilter = SubFilter::all();
        $filter = Filter::all();
        return view('Admin.subfilter.index',compact('subfilter','filter'));
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
