<?php

use Illuminate\Database\Seeder;

class catalogue extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('os_pc')->insert(['os' => 'Windows']);
        DB::table('os_pc')->insert(['os' => 'macOS']);
        DB::table('os_pc')->insert(['os' => 'Linux/GNU']);

        DB::table('os_mobile')->insert(['os' => 'Android']);
        DB::table('os_mobile')->insert(['os' => 'iOS']);
        DB::table('os_mobile')->insert(['os' => 'Android (Huawei)']);

        DB::table('cat_org')->insert(['category' => 'Escuela']);
        DB::table('cat_org')->insert(['category' => 'Hospital público']);
        DB::table('cat_org')->insert(['category' => 'Hospital privado']);
        DB::table('cat_org')->insert(['category' => 'Micro empresa']);
        DB::table('cat_org')->insert(['category' => 'Pequeña empresa']);
        DB::table('cat_org')->insert(['category' => 'Mediana empresa']);
        DB::table('cat_org')->insert(['category' => 'Grande empresa']);


    }
}
