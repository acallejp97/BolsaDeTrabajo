<?php

require_once 'vendor/fzaninotto/faker/src/autoload.php';

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->delete();
        $faker = Faker\Factory::create('es_ES');

        DB::table('user')->insert(array(
            'email' => 'admin@fptxurdinaga.com',
            'nombre' => 'admin',
            'rango' => 0,
            'apellidos' => 'admininstrador',
            'password' => Hash::make('admin'),
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
            'imagen' => $faker->image($dir = '/tmp', $width = 640, $height = 480),
        ));
        DB::table('user')->insert(array(
            'email' => 'a@a.com',
            'nombre' => 'profesor',
            'rango' => 1,
            'apellidos' => 'profesor',
            'password' => Hash::make('prueba'),
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
            'imagen' => $faker->image($dir = '/tmp', $width = 640, $height = 480),
        ));
        DB::table('user')->insert(array(
            'email' => 'b@b.com',
            'nombre' => 'alumno',
            'rango' => 2,
            'apellidos' => 'alumno',
            'password' => Hash::make('prueba'),
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
            'imagen' => $faker->image($dir = '/tmp', $width = 640, $height = 480),
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
                'password' => Hash::make('prueba'),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                'imagen' => $faker->image($dir = '/tmp', $width = 640, $height = 480),
            ));
        }
    }
}
