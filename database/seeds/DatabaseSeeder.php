<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionSeeder::class);
        $this->call(AdministratorTableSeeder::class);
        $this->call(DoctorTable::class);
        $this->call(PatientTable::class);
        $this->call(QuestionTableSeeder::class);
        $this->call(AnswerTableSeeder::class);
    }
}
