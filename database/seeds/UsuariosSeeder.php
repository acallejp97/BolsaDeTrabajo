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
        DB::table('user')->delete();
        $faker = Faker\Factory::create();

        DB::table('user')->insert(array(
            'email' => 'admin@fptxurdinaga.com',
            'nombre' => 'admin',
            'rango' => 0,
            'apellidos' => 'admininstrador',
            'passwd' => Hash::make('admin'),
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ));

        //Cantidad de user a crear
        for ($numerouser = 0; $numerouser != 90; $numerouser++) {
            if ($numerouser <= 5) {
                $rango = 1;
            } else {
                $rango = 2;
            }

            $nombre = explode(' ', trim($faker->name));
            DB::table('user')->insert(array(
                'email' => $faker->email,
                'nombre' => $nombre[0],
                'apellidos' => $faker->name,
                'rango' => $rango,
                'passwd' => Hash::make('prueba'),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}
