<?php
require_once 'vendor/fzaninotto/faker/src/autoload.php';

use Illuminate\Database\Seeder;

class OfertasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('ofertas')->delete();
        for ($i = 0; $i != 3; $i++) {
            DB::table('ofertas')->insert(array(
                'titulo' => $faker->jobTitle,
                'descripcion' => $faker->paragraph(),
                'id_empresa' => $faker->numberBetween(0, 2),
                'id_grado' => $faker->numberBetween(0, 2),
                'id_profesor' => $faker->numberBetween(0, 2),
                'puestos-vacantes' => $faker->numberBetween(1, 30),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }}
}
