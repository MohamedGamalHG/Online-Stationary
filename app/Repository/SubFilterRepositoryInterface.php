<?php


namespace App\Repository;


interface SubFilterRepositoryInterface
{
    public function index();
    public function store($request);
    public function update($request);
    public function delete($request);
}
