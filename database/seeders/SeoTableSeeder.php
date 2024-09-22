<?php

namespace Database\Seeders;

use App\Models\Seo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SeoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
           'name'=>'مهدی اسماعیلی',
            'code_meli'=>'0372009522',
            'phone'=>'09193544391',
            'role'=>1,
            'status'=>1,
            'email'=>'mmahdi@gmail.com',
            'password'=>Hash::make('mahdicfc')
        ]);
    }
}
