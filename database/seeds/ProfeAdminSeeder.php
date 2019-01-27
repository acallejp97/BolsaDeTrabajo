<?php
require_once 'vendor/fzaninotto/faker/src/autoload.php';

use Illuminate\Database\Seeder;

class ProfeAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_ES');

        DB::table('profe-admin')->delete();
        DB::table('profe-admin')->insert(array(
            'id_user' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));

        //Cantidad de profes a crear desde el id
        //Empieza en 2 porque el 1 es siempre el admin
        for ($numeroProfes = 2; $numeroProfes != 7; $numeroProfes++) {
            DB::table('profe-admin')->insert(array(
                'id_user' => $numeroProfes,
                'id_depar' => $faker->numberBetween(1, 6),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}
