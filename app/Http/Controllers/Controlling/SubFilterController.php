<?php

namespace App\Http\Controllers\Controlling;

use App\Http\Controllers\Controller;
use App\Repository\SubFilterRepositoryInterface;
use Illuminate\Http\Request;

class SubFilterController extends Controller
{
    protected $subfilter;
    public function __construct(SubFilterRepositoryInterface $sub)
    {
        $this->subfilter = $sub;
    }
    public function index()
    {
        return $this->subfilter->index();
    }


    public function store(Request $request)
    {
        return $this->subfilter->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $this->subfilter->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return  $this->subfilter->delete($request);
    }
}
