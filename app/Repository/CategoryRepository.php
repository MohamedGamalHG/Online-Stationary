<?php


namespace App\Repository;


use App\Http\Traits\FunctionTrait;
use App\Http\Traits\GeneralTrait;
use App\OnlineStationary\Product\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    use GeneralTrait;
    public function index()
    {
       $category = Category::all();
       return view('Admin.category.index',compact('category'));
    }

    public function store($request)
    {
        try {
            $status = Category::create(['name' => $request->category]);
            if ($status)
              return redirect()->route('category.index');
        }catch (\Exception $e)
        {
            return redirect()->back();
        }
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
