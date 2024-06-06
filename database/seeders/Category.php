<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Category extends Seeder
{

    public function run(): void
    {
        DB::table('categories')->delete();
        $categories = [
            ['name' => ' ملابس رجالي'], ['name' => 'ملابس اطفال'], ['name' => 'ملابس اطفال '],
            ['name' => ' احذية '], ['name' => 'اكسسورات '], ['name' => 'ملابس منزلي '],
        ];
        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
