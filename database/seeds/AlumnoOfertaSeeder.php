<?php
require_once 'vendor/fzaninotto/faker/src/autoload.php';

use Illuminate\Database\Seeder;
use App\Model\Alumno;
use App\Model\Oferta;

class AlumnoOfertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_ES');
        DB::table('alumno_oferta')->delete();
        $alumnos = Alumno::all();
        $ofertas = Oferta::All();
        $id_alumnos = array();
        $id_ofertas = array();
        foreach ($alumnos as $alumno) {
            $id_alumnos[] = $alumno['id'];
        }
        foreach ($ofertas as $oferta) {
            $id_ofertas[] = $oferta['id'];
        }

        for ($cantidadOfertas = 0; $cantidadOfertas != 20; $cantidadOfertas++) {
            DB::table('alumno_oferta')->insert(array(
                'id_alumno' => $id_alumnos[array_rand($id_alumnos)],
                'id_oferta' => $id_ofertas[array_rand($id_ofertas)],
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));

        }
    }
}
