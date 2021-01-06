<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Entities\Core\User::create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => bcrypt('password'),
            'role_id' => \App\Models\Entities\Core\Role::ADMIN_ID
        ]);
    }
}
