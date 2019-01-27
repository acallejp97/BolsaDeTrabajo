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
        'Técnico en Actividades Comerciales',
        'Técnico en Instalaciones de Telecomunicaciones',
        'Técnico en Sistemas Microinformáticos y Redes',
        'Técnico Superior En Integración Social',
        'Técnico Superior en Desarrollo de Aplicaciones Multiplataforma',
        'Técnico Superior en Administración y Finanzas',
        'Técnico Superior en Gestión de Ventas y Espacios Comerciales',
        'Técnico Superior en Laboratorio de Analisis y de Control de Calidad',
        'Técnico Superior en Desarrollo de Aplicaciones Web',
        'Técnico Superior en Administración de Sistemas Informáticos en Red');

    private $abreviacion = array('AC2', 'IT2', 'SM2', 'IS3', 'DM3', 'AF3', 'GV3', 'LA3', 'DW3', 'AS3');

    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('grados')->delete();

        for ($insertarGrado = 0; $insertarGrado < count($this->grados); $insertarGrado++) {
            DB::table('grados')->insert(array(
                'id_depar' => $this->selectDepart($insertarGrado),
                'nombre' => $this->grados[$insertarGrado],
                'abreviacion' => $this->abreviacion[$insertarGrado],
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
