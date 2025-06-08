<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $arrayData = [
            ['statusId' => 1, 'title' => 'Admin'],
            ['statusId' => 1, 'title' => 'Manager'],
            ['statusId' => 5, 'title' => 'Editor'],
            ['statusId' => 1, 'title' => 'Viewer'],
            ['statusId' => 5, 'title' => 'Contributor'],
        ];

        Role::insert($arrayData);
    }
}
