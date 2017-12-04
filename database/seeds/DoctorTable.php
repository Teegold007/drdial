<?php

use Illuminate\Database\Seeder;
use App\Doctor;

class DoctorTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctor = Doctor::create(['name' => 'Ben Mike', 'email' => 'ben123@drdial.com','field' => 'Surgeon', 'password' =>'ben123']);
        $doctor2 = Doctor::create(['name' => 'Smith John', 'email' => 'smith123@drdial.com','field' => 'Dentist', 'password' =>'smith123']);
        $doctor3 = Doctor::create(['name' => 'Martins Scott', 'email' => 'martins@drdial.com','field' => 'Optician', 'password' =>'martins123']);
        $doctor->assignRole('Doctor');
        $doctor2->assignRole('Doctor');
        $doctor3->assignRole('Doctor');
    }
}
