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
        DB::table('usuarios')->delete();
        $faker = Faker\Factory::create();

        DB::table('usuarios')->insert(array(
            'email' => 'admin@fptxurdinaga.com',
            'nombre' => 'admin',
            'rango' => 0,
            'apellidos' => 'admininstrador',
            'passwd' => Hash::make('admin'),
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));

        //Cantidad de usuarios a crear
        for ($numeroUsuarios = 0; $numeroUsuarios != 90; $numeroUsuarios++) {
            if ($numeroUsuarios <= 5) {
                $rango = 1;
            } else {
                $rango = 2;
            }

            $nombre = explode(' ', trim($faker->name));
            DB::table('usuarios')->insert(array(
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
