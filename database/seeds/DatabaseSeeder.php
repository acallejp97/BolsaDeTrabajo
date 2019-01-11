<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('userSeeder');
        $this->call('AlumnosSeeder');
        $this->call('DepartamentosSeeder');
        $this->call('ProfeAdminSeeder');
        $this->call('GradosSeeder');
        $this->call('CurriculumsSeeder');
        $this->call('EmpresasSeeder');
        $this->call('CorreosSeeder');
        $this->call('OfertasSeeder');
    }
}
