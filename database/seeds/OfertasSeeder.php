<?php
require_once 'vendor/fzaninotto/faker/src/autoload.php';

use App\Model\Empresa;
use App\Model\Grado;
use App\Model\Profe_Admin;
use Illuminate\Database\Seeder;

class OfertasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create('es_ES');
        $empresas = Empresa::all();
        $profesores = Profe_Admin::all();
        $id_profesores = array();
        $id_depar_profesores = array();
        $id_empresas = array();
        $id_grados = array();

        foreach ($empresas as $empresa) {
            $id_empresas[] = $empresa['id'];
        }
        
        foreach ($profesores as $profesor) {
            $id_profesores[] = $profesor['id'];
            $id_depar_profesores[] = $profesor['id_depar'];
        }

        DB::table('ofertas')->delete();
        for ($cantidadOfertas = 0; $cantidadOfertas != 20; $cantidadOfertas++) {

            $numero = $faker->numberBetween(1, count($id_profesores) - 1);
            $grados = Grado::where('id_depar', $id_depar_profesores[$numero])->get();

            foreach ($grados as $grado) {
                $id_grados[] = $grado['id'];
            }
            DB::table('ofertas')->insert(array(
                'titulo' => $faker->jobTitle,
                'descripcion' => $faker->paragraph(),
                'id_empresa' => $id_empresas[array_rand($id_empresas)],
                'id_grado' => $id_grados[array_rand($id_grados)],
                'id_profesor' => $id_profesores[$numero],
                'puestos-vacantes' => $faker->numberBetween(1, 30),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}
