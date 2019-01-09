<?php
require_once 'vendor/fzaninotto/faker/src/autoload.php';

use Illuminate\Database\Seeder;

class GradosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $grados = array(
        'Tecnico en Actividades Comerciales',
        'Tecnico en Instalaciones de Telecomunicaciones',
        'Tecnico en Sistemas Microinformaticos y Redes',
        'Tecnico Superior En Integracion Social',
        'Tecnico Superior en Desarrollo de Aplicaciones Multiplataforma',
        'Tecnico Superior en Administracion y Finanzas',
        'Tecnico Superior en Gestion de Ventas y Espacios Comerciales',
        'Tecnico Superior en Laboratorio de Analisis y de Control de Calidad',
        'Tecnico Superior en Desarrollo de Aplicaciones Web',
        'Tecnico Superior en Administracion de Sistemas Informaticos en Red');

    private $abreviacion = array('AC2', 'IT2', 'SM2', 'IS3', 'DM3', 'AF3', 'GV3', 'LA3', 'DW3', 'AS3');

    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('grados')->delete();

        for ($i = 0; $i < count($this->grados); $i++) {
            DB::table('grados')->insert(array(
                'id_depar' => $this->selectDepart($i),
                'nombre' => $this->grados[$i],
                'abreviacion' => $this->abreviacion[$i],
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }


    public function selectDepart($i)
    {
        switch ($this->abreviacion[$i]) {
            case 'SM2';
            case 'DM3';
            case 'DW3';
            case 'AS3':
                $id_depart = 1;
                break;
            case 'LA3':
                $id_depart = 2;
                break;
            case 'AC2';
            case 'GV3':
                $id_depart = 3;
                break;
            case 'IT2':
                $id_depart = 4;
                break;
            case 'IS3':
                $id_depart = 5;
                break;
            case 'AF3':
                $id_depart = 6;
                break;
        }
        return $id_depart;
    }
}
