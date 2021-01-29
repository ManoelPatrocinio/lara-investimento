<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'cpf'       => '09867545432',
            'name'      => 'manoel patrocinio',
            'phone'     => '74988567643',
            'birth'     => '1999-12-12',
            'gender'    => 'M',
            'email'     => 'mah@gmail.com',
            'password'  => env('PASSWOR_HASH') ? bcrypt('123') : '123',
        ]);
    }
}
