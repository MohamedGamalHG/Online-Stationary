<?php

namespace OnlineStationary\Product\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use OnlineStationary\Product\Models\Product;

class ImportProduct implements ToModel,WithHeadingRow
{
    /*here we are using WithHeadingRow because we using the WithHeading in ExportProduct for that reason you should use WithHeadingRow
    if you are not using WithHeading in Export then you will make Row in the model function that below like that
     return new Product([
            'name'      => $row[0],
            'details'   => $row[1],
            'quantity'  => $row[2],
            'price'     => $row[3],

        ]);
     * */
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //return dd($row);
        return new Product([
            'name'      => $row['name'],
            'details'   => $row['details'],
            'quantity'  => $row['quantity'],
            'price'     => $row['price'],

        ]);
    }
}
