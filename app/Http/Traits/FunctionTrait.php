<?php


namespace App\Http\Traits;

use App\OnlineStationary\Product\Models\Category;
trait FunctionTrait
{
    public function storeTrait($modelName,$arrayPrameter)
    {
        $path = 'App\Models\\';
        //return dd($arrayPrameter);
        try {
           '\app\Models\\'.$modelName::create($arrayPrameter);
            return true;
        }catch(\Exception $e)
        {
            return false;
        }
    }
}
