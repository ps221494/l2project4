<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['id' => 1, 'rname' => 'klant'],
            ['id' => 999, 'rname' => 'admin'],
            ['id' => 2, 'rname' => 'balie'],
            ['id' => 3, 'rname' => 'bereiding'],
            ['id' => 4, 'rname' => 'bezorging'],
            ['id' => 5, 'rname' => 'management'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
