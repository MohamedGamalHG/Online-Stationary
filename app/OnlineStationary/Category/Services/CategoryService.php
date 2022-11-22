<?php


namespace OnlineStationary\Category\Services;



use OnlineStationary\Category\Models\Category;

class CategoryService
{
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
        $category = Category::find($request->id);
        if(!isset($category))
            return redirect()->route('category.index');
        try {
            $category->update(['name'=>$request->category]);
            if($category)
                return redirect()->route('category.index');
        }catch (\Exception $e)
        {
            return redirect()->back();
        }
    }

    public function delete($request)
    {
        $category = Category::findOrFail($request->id)->delete();
        return  redirect()->route('category.index');

    }
}
