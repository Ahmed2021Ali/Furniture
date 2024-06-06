<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class Roles extends Seeder
{

    public function run(): void
    {
        $roles = [
            ['name' => 'admin'],
            ['name' => 'user'],
        ];
        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
