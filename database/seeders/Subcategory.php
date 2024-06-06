<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Subcategory extends Seeder
{
    public function run(): void
    {
        DB::table('subcategories')->delete();
        $subcategories = [
            ['name' => '  جواكيت شتوى', 'category_id' => '1'],
            ['name' => '  تيشيرت بولو رجالى ', 'category_id' => '1'],
            ['name' => ' تيشيرت مطبوع  ', 'category_id' => '1'],
            ['name' => ' كولكشن تيشيرت الكليات  ', 'category_id' => '1'],

            ['name' => '  جواكيت شتوى', 'category_id' => '2'],
            ['name' => '  تيشيرت بولو رجالى ', 'category_id' => '2'],
            ['name' => ' تيشيرت مطبوع  ', 'category_id' => '2'],
            ['name' => ' كولكشن تيشيرت الكليات  ', 'category_id' => '2'],

            ['name' => '  جواكيت شتوى', 'category_id' => '3'],
            ['name' => '  تيشيرت بولو رجالى ', 'category_id' => '3'],
            ['name' => ' تيشيرت مطبوع  ', 'category_id' => '3'],
            ['name' => ' كولكشن تيشيرت الكليات  ', 'category_id' => '3'],

            ['name' => '  جواكيت شتوى', 'category_id' => '4'],
            ['name' => '  تيشيرت بولو رجالى ', 'category_id' => '4'],
            ['name' => ' تيشيرت مطبوع  ', 'category_id' => '4'],
            ['name' => ' كولكشن تيشيرت الكليات  ', 'category_id' => '4'],

            ['name' => '  جواكيت شتوى', 'category_id' => '5'],
            ['name' => '  تيشيرت بولو رجالى ', 'category_id' => '5'],
            ['name' => ' تيشيرت مطبوع  ', 'category_id' => '5'],
            ['name' => ' كولكشن تيشيرت الكليات  ', 'category_id' => '5'],

            ['name' => '  جواكيت شتوى', 'category_id' => '6'],
            ['name' => '  تيشيرت بولو رجالى ', 'category_id' => '6'],
            ['name' => ' تيشيرت مطبوع  ', 'category_id' => '6'],
            ['name' => ' كولكشن تيشيرت الكليات  ', 'category_id' => '6'],

        ];
        foreach ($subcategories as $subcategory) {
            $subcategory = \App\Models\Subcategory::create($subcategory);
            $subcategory->addMediaFromUrl('https://sutrastores.com/cdn/shop/files/Arabic.png?v=1682764857&width=200')->toMediaCollection('subCategoryImages');
        }
    }
}
