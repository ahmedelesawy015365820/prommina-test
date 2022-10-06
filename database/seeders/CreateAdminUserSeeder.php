<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\User;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'ahmed',
            'last_name' => 'elesawy',
            'username' => 'elesawy20',
            'email' => 'admin@admin.com',
            'password' => 12345678,
        ]);

    }
}
