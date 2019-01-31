<?php

require_once 'vendor/fzaninotto/faker/src/autoload.php';

use Illuminate\Database\Seeder;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        $departamentos = array('Informatica y Comunicaciones', 'Quimica', 'Comercio y Marketing', 'Electricidad y Electronica', 'Servicios Socioculturales y a la Comunidad', 'Administracion y Gestion');

        DB::table('departamentos')->delete();

        foreach ($departamentos as $departamento) {
            DB::table('departamentos')->insert(array(
                'nombre' => $departamento,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}
