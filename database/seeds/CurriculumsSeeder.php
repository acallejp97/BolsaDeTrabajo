<?php
require_once 'vendor/fzaninotto/faker/src/autoload.php';

use Illuminate\Database\Seeder;
use App\Model\Alumno;

class CurriculumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dir=public_path('/images');
        $faker = Faker\Factory::create('es_ES');
                $alumnos=Alumno::all();

        DB::table('curriculums')->delete();
        foreach ($alumnos as $alumno) {
            $nombre = explode(' ', trim($faker->name));

            DB::table('curriculums')->insert(array(
                'id_alumno' => $alumno->id,
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
                'imagen' => $faker->image($dir, $width = 640, $height = 480),
            ));
        }
    }
}
