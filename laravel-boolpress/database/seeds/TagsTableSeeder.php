<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'cronaca',
            'lettura veloce',
            'utilita',
            'informativo'
        ];

        foreach($tags as $item) {
            $new_tag = new Tag();
            $new_tag->name = $item;
            $new_tag->slug = Str::slug($new_tag->name,'-');
            $new_tag->save();
        }
    }
}
