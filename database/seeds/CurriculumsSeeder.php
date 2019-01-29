<?php
require_once 'vendor/fzaninotto/faker/src/autoload.php';

use Illuminate\Database\Seeder;

class CurriculumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_ES');

        DB::table('curriculums')->delete();
        for ($cantidadCurriculum = 1; $cantidadCurriculum != 25; $cantidadCurriculum++) {
            $nombre = explode(' ', trim($faker->name));
            DB::table('curriculums')->insert(array(
                'id_alumno' => ($cantidadCurriculum),
                'nombre' => $nombre[0],
                'apellidos' => $faker->name,
                'email' => $faker->email,
                'direccion' => $faker->address,
                'experiencia' => $faker->paragraph,
                'competencias' => $faker->paragraph,
                'idiomas' => $faker->paragraph,
                'otros_datos' => $faker->paragraph,
                'telefono' => $faker->numberBetween(600000000, 699999999),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                'imagen' => $faker->image($dir = '/tmp', $width = 640, $height = 480),
            ));
        }
    }
}
