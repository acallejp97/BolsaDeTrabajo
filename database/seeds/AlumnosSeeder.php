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
        $faker = Faker\Factory::create();

        DB::table('alumnos')->delete();
        for ($i = 0; $i != 2; $i++) {
            DB::table('alumnos')->insert(array(
                'id_user' => preguntar a julia como hacer lo de las foreign key,
                'anio_fin' => $faker->numberBetween(2000,2019),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}
