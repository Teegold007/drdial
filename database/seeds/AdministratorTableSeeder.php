<?php

use Illuminate\Database\Seeder;
use App\Administrator;

class AdministratorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Administrator::create(['name' => 'Razaq Ogunlade', 'email' => 'razaqofficial@gmail.com', 'password' =>'razaq123']);
     // $admin->assignRole('Developer');
    }
}
