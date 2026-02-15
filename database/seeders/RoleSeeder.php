<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public $roles = [
        [
            'name' => 'superadmin',
            'display_name' => 'Superadmin'
        ],
        [
            'name' => 'admin-event',
            'display_name' => 'Admin Event'
        ],
        [
            'name' => 'admin-team',
            'display_name' => 'Admin Team'
        ]
    ];
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->roles as $role) {
            Role::create([
                'name' => $role['name'],
                'display_name' => $role['display_name']
            ]);
        }
    }
}
