<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Marketing',
            'Politica',
            'Blog',
            'Cucina',
            'Scienza'
        ];

        foreach($categories as $item) {
            $new_cat = new Category();
            $new_cat->name = $item;
            $new_cat->slug = Str::slug($new_cat->name,'-');
            $new_cat->save();
        }
    }
}
