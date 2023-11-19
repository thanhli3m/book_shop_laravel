<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'category_name' => 'Kinh',
            'category_des' => ''
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Luật',
            'category_des' => ''
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Lục',
            'category_des' => ''
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Luận',
            'category_des' => ''
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Kinh',
            'category_des' => ''
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Khoa Nghi',
            'category_des' => ''
        ]); 
        DB::table('categories')->insert([
            'category_name' => 'Văn học',
            'category_des' => ''
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Sử học',
            'category_des' => ''
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Triết học',
            'category_des' => ''
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Đông y',
            'category_des' => ''
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Kinh',
            'category_des' => ''
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Kinh',
            'category_des' => ''
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Kinh',
            'category_des' => ''
        ]);
    }
}
