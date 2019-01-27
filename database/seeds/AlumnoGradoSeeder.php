<?php
require_once 'vendor/fzaninotto/faker/src/autoload.php';

use Illuminate\Database\Seeder;

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

        for ($cantidadOfertas = 0; $cantidadOfertas != 20; $cantidadOfertas++) {
            DB::table('alumno_grado')->insert(array(
                'id_alumno' => $faker->numberBetween(1, 25),
                'id_grado' => $faker->numberBetween(1, 10),
            ));

        }
    }
}
