<?php
require_once 'vendor/fzaninotto/faker/src/autoload.php';

use Illuminate\Database\Seeder;

class GradosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('grados')->delete();
        for ($i = 0; $i != 3; $i++) {
            DB::table('grados')->insert(array(
                'id_depar' => $faker->numberBetween(0, 2),
                'nombre' => $faker->departmentName,
                'abreviacion' => 'AAA',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}
