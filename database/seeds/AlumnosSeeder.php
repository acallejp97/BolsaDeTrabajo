<?php
require_once 'vendor/fzaninotto/faker/src/autoload.php';

use Illuminate\Database\Seeder;

class AlumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_ES');

        DB::table('alumnos')->delete();
        for ($numeroAlumnos = 4; $numeroAlumnos != 30; $numeroAlumnos++) {
            DB::table('alumnos')->insert(array(
                'id_user' => $numeroAlumnos,
                'anio_fin' => $faker->numberBetween(2000,2019),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}
