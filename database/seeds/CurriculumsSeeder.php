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
        $faker = Faker\Factory::create();

        DB::table('curriculums')->delete();
        for ($i = 1; $i != 2; $i++) {
            DB::table('curriculums')->insert(array(
                'id_alumno'=> $i,
                'nombre' => $faker->name,
                'apellidos' => $faker->name,
                'experiencia' => $faker->paragraph(),
                'competencias' => $faker->paragraph(),
                'idiomas' => $faker->paragraph(),
                'otros_datos' => $faker->paragraph(),
                'telefono' => $faker->phoneNumber,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}
