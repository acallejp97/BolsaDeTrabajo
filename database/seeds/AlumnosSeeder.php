<?php
require_once 'vendor/fzaninotto/faker/src/autoload.php';

use Illuminate\Database\Seeder;
use App\User;
class AlumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numeroAlumnos=User::where('rango',2)->get();
        $faker = Faker\Factory::create('es_ES');

        DB::table('alumnos')->delete();
        foreach ($numeroAlumnos as $numeroAlumno) {
            DB::table('alumnos')->insert(array(
                'id_user' => $numeroAlumno->id,
                'anio_fin' => $faker->numberBetween(2000,2019),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}
