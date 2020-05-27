<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class datos_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('datos_biometricos')->insert([
            'temp'=>true,
            'tos'=>false,
            'obs'=>'Presenta una leve tos',
            'fecha'=>Carbon::now(),
            'id_usr_org'=>1,
        ]);
        
        DB::table('datos_biometricos')->insert([
            'temp'=>false,
            'tos'=>false,
            'obs'=>'No presenta ningun sintoma',
            'fecha'=>Carbon::now()->subDays(15),
            'id_usr_org'=>2,
        ]);

        DB::table('datos_biometricos')->insert([
            'temp'=>true,
            'tos'=>true,
            'obs'=>'Posible caso positivo, presenta ambos sintomas',
            'fecha'=>Carbon::now()->addDays(10),
            'id_usr_org'=>1,
        ]);


    }
}
