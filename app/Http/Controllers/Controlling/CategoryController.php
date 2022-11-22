<?php

namespace App\Http\Controllers\Controlling;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OnlineStationary\Category\Models\Category;
use OnlineStationary\Category\Requests\CategoryRequest;
use OnlineStationary\Category\Services\CategoryService;

class CategoryController extends Controller
{
   private CategoryService $cat;
   public function __construct(CategoryService $categoryserivce)
   {
       $this->cat = $categoryserivce;
   }
    public function index()
    {
        return $this->cat->index();
    }


    public function store(CategoryRequest $request)
    {
        return $this->cat->store($request);
    }

    public function update(CategoryRequest $request)
    {
        return $this->cat->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request )
    {
        return $this->cat->delete($request);
    }
}
