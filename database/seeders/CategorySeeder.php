<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $arrayData = [
            ['statusId' => 1, 'title' => 'Electronics'],
            ['statusId' => 1, 'title' => 'Fashion'],
            ['statusId' => 5, 'title' => 'Automotive'],
            ['statusId' => 1, 'title' => 'Pet Supplies'],
            ['statusId' => 1, 'title' => 'Construction'],
        ];

        Category::insert($arrayData);
    }
}
