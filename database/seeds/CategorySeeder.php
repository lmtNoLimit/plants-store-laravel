<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title' => 'Cây phong thuỷ',
            'slug' => 'cay_phong_thuy'
        ]);
        Category::create([
            'title' => 'Cây trong nhà',
            'slug' => 'cay_trong_nha'
        ]);
        Category::create([
            'title' => 'Cây để bàn',
            'slug' => 'cay_de_ban'
        ]);
        Category::create([
            'title' => 'Cây văn phòng',
            'slug' => 'cay_van_phong'
        ]);
        Category::create([
            'title' => 'Cây sen đá',
            'slug' => 'cay_sen_da'
        ]);
        Category::create([
            'title' => 'Cây thuỷ sinh',
            'slug' => 'cay_thuy_sinh'
        ]);
        Category::create([
            'title' => 'Cây xương rồng',
            'slug' => 'cay_xuong_rong'
        ]);
    }
}
