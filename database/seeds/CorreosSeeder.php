<?php
require_once 'vendor/fzaninotto/faker/src/autoload.php';

use App\User;
use Illuminate\Database\Seeder;

class CorreosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_ES');
        $usuarios = User::where('rango', '<>', 0)->get();
        $id_usuarios = array();

        foreach ($usuarios as $usuario) {
            $id_usuarios[] = $usuario['id'];
        }

        DB::table('correos')->delete();
        for ($cantidadCorreos = 0; $cantidadCorreos != 9; $cantidadCorreos++) {
            DB::table('correos')->insert(array(
                'id_remit' => $id_usuarios[array_rand($id_usuarios)],
                'asunto' => $faker->title,
                'descripcion' => $faker->paragraph(),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}
