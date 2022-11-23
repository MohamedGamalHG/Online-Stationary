<?php

namespace OnlineStationary\Product\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use OnlineStationary\Product\Models\Product;

class ExportProduct implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select('name','details','quantity','price')->get();
    }

    public function headings(): array
    {
        return  [
            'Name','Details','Quantity','Price'
        ];
    }
}
