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
    private $arrayDepartamentos = array('Informatica y Comunicaciones', 'Quimica', 'Comercio y Marketing', 'Electricidad y Electronica', 'Servicios Socioculturales y a la Comunidad', 'Administracion y Gestion');

    public function run()
    {

        DB::table('departamentos')->delete();

        for ($numeroDepartamento = 0; $numeroDepartamento < count($this->arrayDepartamentos); $numeroDepartamento++) {
            DB::table('departamentos')->insert(array(
                'nombre' => $this->arrayDepartamentos[$numeroDepartamento],
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}
