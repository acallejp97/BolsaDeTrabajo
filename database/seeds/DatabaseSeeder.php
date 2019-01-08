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
        $this->call('01_UsuariosSeeder');
        $this->call('02_AlumnosSeeder');
        $this->call('03_DepartamentosSeeder');
        $this->call('04_ProfeAdminSeeder');
        $this->call('05_GradosSeeder');
        $this->call('06_CurriculumsSeeder');
        $this->call('07_EmpresasSeeder');
        $this->call('08_CorreosSeeder');
        $this->call('09_OfertasSeeder');
    }
}


