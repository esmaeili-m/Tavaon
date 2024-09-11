<?php

namespace Database\Seeders;

use App\Models\Seo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Seo::truncate();
        Seo::create([
           'page_id'=>1,
            'type'=>'page'
        ]);
        Seo::create([
           'page_id'=>2,
           'type'=>'page'
        ]);
    }
}
