<?php
require_once 'vendor/fzaninotto/faker/src/autoload.php';

use Illuminate\Database\Seeder;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('empresas')->delete();

        for ($i = 0; $i != 3; $i++) {
            DB::table('empresas')->insert(array(
                'nombre' => $faker->name,
                'direccion' => $faker->address,
                'email' => $faker->email,
                'url' => $faker->url,
                'telefono' => $faker->phoneNumber,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}