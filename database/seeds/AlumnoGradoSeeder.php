<?php
require_once 'vendor/fzaninotto/faker/src/autoload.php';

use Illuminate\Database\Seeder;
use App\Model\Alumno;
use App\Model\Grado;

class AlumnoGradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_ES');
        DB::table('alumno_grado')->delete();
        $alumnos = Alumno::all();
        $grados = Grado::all();
        $id_grados=array();
        foreach ($grados as $grado) {
            $id_grados[] = $grado['id'];
        }

        foreach ($alumnos as $alumno) {
            DB::table('alumno_grado')->insert(array(
                'id_alumno' => $alumno->id,
                'id_grado' =>$id_grados[array_rand($id_grados)],
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}
