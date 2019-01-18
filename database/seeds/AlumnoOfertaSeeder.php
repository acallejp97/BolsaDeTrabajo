<?php
require_once 'vendor/fzaninotto/faker/src/autoload.php';

use Illuminate\Database\Seeder;

class AlumnoOfertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('alumno_oferta')->delete();

        for ($cantidadOfertas = 0; $cantidadOfertas != 20; $cantidadOfertas++) {
            DB::table('alumno_oferta')->insert(array(
                'id_alumno' => $faker->numberBetween(1, 25),
                'id_oferta' => $faker->numberBetween(1, 20),
            ));

        }
    }
}
