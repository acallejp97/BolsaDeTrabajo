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
        $faker = Faker\Factory::create();
        DB::table('profe-admin')->insert(array(
            'id_user' => 1,
            'rango' => 0,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));

        DB::table('profe-admin')->delete();
        for ($i = 2; $i < 4; $i++) {
            DB::table('profe-admin')->insert(array(
                'id_user' => $i,
                'rango'=>1,
                'id_depar' => $faker->numberBetween(1,6),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}
