<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'name' => 'Motivo',
            'email' => 'welkom@motivo.nl',
            'password' => Hash::make('Test123'),
            'email_verified_at' => now(),
        ]);
    }
}
