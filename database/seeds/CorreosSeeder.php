<?php
require_once 'vendor/fzaninotto/faker/src/autoload.php';

use Illuminate\Database\Seeder;

class CorreosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('correos')->delete();

        for ($cantidadCorreos = 0; $cantidadCorreos != 9; $cantidadCorreos++) {
            DB::table('correos')->insert(array(
                'id_remit' => $faker->numberBetween(1,30),
                'asunto' => $faker->title,
                'descripcion' => $faker->paragraph(),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}
