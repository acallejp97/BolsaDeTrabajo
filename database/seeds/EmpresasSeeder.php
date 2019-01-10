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
        for ($cantidadEmpresas = 0; $cantidadEmpresas != 6; $cantidadEmpresas++) {
            DB::table('empresas')->insert(array(
                'nombre' => $faker->company,
                'direccion' => $faker->address,
                'email' => $faker->companyEmail,
                'url' => $faker->url,
                'telefono' => $faker->numberBetween(600000000,699999999),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}