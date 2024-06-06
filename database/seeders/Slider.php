<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Slider extends Seeder
{

    public function run(): void
    {
        DB::table('sliders')->delete();
        $sliders = [
            ['sub_category_id' => '1 '],
            ['sub_category_id' => '2 '],
            ['sub_category_id' => ' 3'],
            ['sub_category_id' => ' 4'],
            ['sub_category_id' => ' 5'],

        ];
        foreach ($sliders as $slider) {
            $slider = \App\Models\Product::create($slider);
            $slider->addMediaFromUrl('https://cdn.shopify.com/s/files/1/0569/3246/6848/files/pc-ar_0938fe71-bcc3-4cd0-9c7e-3a9d2cd24828.jpg?v=1716211607&width=2000')->toMediaCollection('sliderImages');
        }
    }
}
