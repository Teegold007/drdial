<?php

use Illuminate\Database\Seeder;
use App\Patient;

class PatientTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patient =  Patient::create(['name' => 'Lucky Simon', 'email' => 'lucky123@drdial.com','password' =>'luck123']);
        $patient2 = Patient::create(['name' => 'Juliet Johnson', 'email' => 'juliet123@drdial.com', 'password' =>'juliet123']);
        $patient3 = Patient::create(['name' => 'Sunday Monday', 'email' => 'sunday123@drdial.com', 'password' =>'sunday123']);
        $patient->assignRole('Patient');
        $patient2->assignRole('Patient');
        $patient3->assignRole('Patient');
    }
}
