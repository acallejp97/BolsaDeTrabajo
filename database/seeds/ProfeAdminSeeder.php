<?php
require_once 'vendor/fzaninotto/faker/src/autoload.php';

use Illuminate\Database\Seeder;
use App\User;
class ProfeAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_ES');
        $profesores=User::where('rango','<>',2)->get();

        DB::table('profe-admin')->delete();

        //Cantidad de profes a crear desde el id
        //Empieza en 2 porque el 1 es siempre el admin
        foreach ($profesores as $profesor) {
            DB::table('profe-admin')->insert(array(
                'id_user' => $profesor->id,
                'id_depar' => $faker->numberBetween(1, 6),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}
