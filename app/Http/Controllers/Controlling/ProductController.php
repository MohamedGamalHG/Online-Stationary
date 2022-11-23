<?php

namespace App\Http\Controllers\Controlling;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use OnlineStationary\Product\Exports\ExportProduct;
use OnlineStationary\Product\Imports\ImportProduct;
use OnlineStationary\Product\Requests\ProductRequest;
use OnlineStationary\Product\Services\ProductService;

class ProductController extends Controller
{
    private ProductService $pro;
    public function __construct(ProductService $product)
    {
        $this->pro = $product;
    }

    public function import(Request $request)
    {
        return $this->pro->import($request);
    }
    public function export()
    {
       return $this->pro->export();
    }
    public function ShowImage($id)
    {
        return $this->pro->ShowImages($id);
    }
    public function index()
    {
        return $this->pro->index();
    }


    public function store(ProductRequest $request)
    {
        return $this->pro->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  $this->pro->show($id);
    }

    public function edit($id)
    {
        return  $this->pro->edit($id);
    }


    public function update(ProductRequest $request)
    {

        return $this->pro->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->pro->delete($request);
    }
}
