<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProposalSeeder extends Seeder
{
    public function run(): void
    {
        $arrayData = [
            ['userId' => 1, 'productId' => 1, 'productSwapId' => 2, 'statusId' => 3],
            ['userId' => 2, 'productId' => 2, 'productSwapId' => 3, 'statusId' => 3],
            ['userId' => 3, 'productId' => 3, 'productSwapId' => 4, 'statusId' => 2],
            ['userId' => 4, 'productId' => 4, 'productSwapId' => 5, 'statusId' => 3],
            ['userId' => 5, 'productId' => 5, 'productSwapId' => 6, 'statusId' => 3],
            ['userId' => 6, 'productId' => 6, 'productSwapId' => 7, 'statusId' => 2],
            ['userId' => 7, 'productId' => 7, 'productSwapId' => 8, 'statusId' => 3],
            ['userId' => 8, 'productId' => 8, 'productSwapId' => 9, 'statusId' => 3],
            ['userId' => 9, 'productId' => 9, 'productSwapId' => 10, 'statusId' => 3],
            ['userId' => 10, 'productId' => 10, 'productSwapId' => 1, 'statusId' => 3],
        ];
    }
}
