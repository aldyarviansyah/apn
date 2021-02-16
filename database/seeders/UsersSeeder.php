<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'username' => 'admin',
            'full_name' => 'Administrator',
            'email' => 'administrator@mail.com',
            'password' => '1234',
            'type' => 'user',
        ]);

        $user2 = User::create([
            'username' => 'engadiman',
            'full_name' => 'Eric Ngadiman',
            'email' => 'engadiman@mail.com',
            'password' => '1234',
            'type' => 'user',
        ]);

        $user3 = User::create([
            'username' => 'guruh',
            'full_name' => 'Muhammad Guruh',
            'email' => 'guruh@mail.com',
            'password' => '1234',
            'type' => 'user',
        ]);

        $user4 = User::create([
            'username' => 'redi',
            'full_name' => 'Capt. Redi Dasman',
            'email' => 'redi@mail.com',
            'password' => '1234',
            'type' => 'user',
        ]);

        $user5 = User::create([
            'username' => 'fjahja',
            'full_name' => 'Ferdian Jahja',
            'email' => 'fjahja@mail.com',
            'password' => '1234',
            'type' => 'user',
        ]);

        $user1->assignRole('Administrator');
        $user2->assignRole('Administrator');
        $user3->assignRole('Administrator');
        $user4->assignRole('Administrator');
        $user5->assignRole('Administrator');

        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            $user1->givePermissionTo($permission);
            $user2->givePermissionTo($permission);
            $user3->givePermissionTo($permission);
            $user4->givePermissionTo($permission);
            $user5->givePermissionTo($permission);
        }
    }
}
