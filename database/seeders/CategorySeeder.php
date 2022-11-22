<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use OnlineStationary\Category\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $cat = [
            'Books',
            'Pens',
            'NoteBook',
            'Others',
        ];
        foreach ($cat as $cats) {
            $category = Category::create(['name'=>$cats]);
            }
    }
}
