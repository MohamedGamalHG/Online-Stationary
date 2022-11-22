<?php

namespace App\Http\Controllers\Controlling;

use App\Http\Controllers\Controller;
use App\Repository\FilterRepositoryInterface;
use Illuminate\Http\Request;

class FilterController extends Controller
{

    protected $filter;
    public  function __construct(FilterRepositoryInterface $fil)
    {
        $this->filter = $fil;
    }
    public function index()
    {
        return $this->filter->index();
    }



    public function store(Request $request)
    {
        return $this->filter->store($request);
    }


    public function update(Request $request)
    {
        return $this->filter->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->filter->delete($request);
    }
}
