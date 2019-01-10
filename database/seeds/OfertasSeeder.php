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
        for ($cantidadOfertas = 0; $cantidadOfertas != 20; $cantidadOfertas++) {
            DB::table('ofertas')->insert(array(
                'titulo' => $faker->jobTitle,
                'descripcion' => $faker->paragraph(),
                'id_empresa' =>$faker->numberBetween(1,6),
                'id_grado' => $faker->numberBetween(1,10),
                'id_profesor' => $faker->numberBetween(2,6),
                'puestos-vacantes' => $faker->numberBetween(1, 30),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }}
}
