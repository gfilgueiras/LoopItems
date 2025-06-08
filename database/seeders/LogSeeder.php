<?php

namespace Database\Seeders;

use App\Models\Log;
use Illuminate\Database\Seeder;

class LogSeeder extends Seeder
{
    public function run(): void
    {
        $arrayData = [
            ['userId' => random_int(1, 20), 'dataBefore' => json_encode([]), 'dataAfter' => json_encode([]), 'message' => 'Hi, i am a first log', 'comment' => 'New 01', 'severity' => 'Debug'],
            ['userId' => random_int(1, 20), 'dataBefore' => json_encode([]), 'dataAfter' => json_encode([]), 'message' => 'Hi, i am a second', 'comment' => 'New 02', 'severity' => 'Info'],
        ];

        Log::insert($arrayData);
    }
}
