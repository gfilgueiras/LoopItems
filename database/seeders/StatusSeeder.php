<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        $arrayData = [
            ['title' => 'Active'],
            ['title' => 'In negotiation'],
            ['title' => 'Pendent'],
            ['title' => 'Declined'],
            ['title' => 'Inactive'],
            ['title' => 'Done'],
        ];

        Status::insert($arrayData);
    }
}
