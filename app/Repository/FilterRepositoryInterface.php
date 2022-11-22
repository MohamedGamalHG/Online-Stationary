<?php


namespace App\Repository;


interface FilterRepositoryInterface
{
    public function index();
    public function store($request);
    public function update($request);
    public function delete($request);
}
