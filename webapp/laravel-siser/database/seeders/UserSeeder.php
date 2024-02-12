<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => '$2y$10$QUphzWoHSe.mcIZ9lQL7JO2xBOGgZccJBbNQehCFERH/8wE32kd8q', //Password 1234
            'name' => 'Raja Muda Gading Tulen',
            'phone' => '082210142288',
            'email' => 'gadingthebeat@gmail.com',
            'date_of_birth' => '2000-08-23',
            'job' => 'Admin',
            'role' => 'admin',
            'gender' => 'Laki-laki',
            'id_card_number' => '14429990200021',
            'status' => 'confirmed',
            'description_reject' => NULL,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('users')->insert([
            'username' => 'gading',
            'password' => '$2y$10$QUphzWoHSe.mcIZ9lQL7JO2xBOGgZccJBbNQehCFERH/8wE32kd8q', //Password 1234
            'name' => 'Nixon Sihite',
            'phone' => '082210142277',
            'email' => 'gadingthebeat12@gmail.com',
            'date_of_birth' => '2000-08-23',
            'job' => 'IT Consultant',
            'role' => 'host',
            'gender' => 'Laki-laki',
            'id_card_number' => '14429990200022',
            'status' => 'confirmed',
            'description_reject' => NULL,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('users')->insert([
            'username' => 'nixon',
            'password' => '$2y$10$QUphzWoHSe.mcIZ9lQL7JO2xBOGgZccJBbNQehCFERH/8wE32kd8q', //Password 1234
            'name' => 'Nixon Sinaga',
            'phone' => '082210142278',
            'email' => 'gadingthebeat13@gmail.com',
            'date_of_birth' => '2000-08-23',
            'job' => 'IT Consultant',
            'role' => 'member',
            'gender' => 'Laki-laki',
            'id_card_number' => '14429990200023',
            'status' => 'waiting',
            'description_reject' => NULL,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('users')->insert([
            'username' => 'mulyani',
            'password' => '$2y$10$QUphzWoHSe.mcIZ9lQL7JO2xBOGgZccJBbNQehCFERH/8wE32kd8q', //Password 1234
            'name' => 'Mulyani Sihite',
            'phone' => '082210142279',
            'email' => 'gadingthebeat14@gmail.com',
            'date_of_birth' => '2000-08-23',
            'job' => 'IT Consultant',
            'role' => 'member',
            'gender' => 'Laki-laki',
            'id_card_number' => '14429990200024',
            'status' => 'waiting',
            'description_reject' => NULL,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);
    }
}
