<?php
require_once 'vendor/fzaninotto/faker/src/autoload.php';

use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('usuarios')->delete();
        for ($i = 0; $i != 5; $i++) {
            DB::table('usuarios')->insert(array(
                'email' => $faker->email,
                'nombre' => $faker->name,
                'apellidos' => $faker->name,
                'passwd' => $faker->password,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}
