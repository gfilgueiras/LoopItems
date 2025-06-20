<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            StatusSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            ConditionSeeder::class,
            ProductSeeder::class,
            PhotoSeeder::class,
            ProposalSeeder::class,
            LogSeeder::class,
        ]);
    }
}
