<?php

namespace Database\Seeders;

use App\Models\Condition;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    public function run(): void
    {
        $arrayData = [
            ['statusId' => 1, 'title' => 'New'],
            ['statusId' => 1, 'title' => 'Used'],
            ['statusId' => 5, 'title' => 'Used-Good'],
            ['statusId' => 1, 'title' => 'Used-Acceptable'],
            ['statusId' => 5, 'title' => 'For parts or Not Working'],
        ];

        Condition::insert($arrayData);
    }
}
