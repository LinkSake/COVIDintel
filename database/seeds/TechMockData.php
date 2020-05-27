<?php

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TechMockData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Usuarios
        DB::table('users')->insert([
            'name' => Str::random(5),
            'lastname_f' => Str::random(5),
            'lastname_m' => Str::random(5),
            'email' => 'admin@mail.com',
            'password' => Hash::make('123456'),
            'phone' => mt_rand(1000000000, 9999999999),
            'curp' => Str::random(18),
            'pc' => 'ESCRITORIO',
            'mobile' => true,
            'internet' => true,
            'mobile_data' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'id_os_pc' => 2,
            'id_os_mobile' => 2,
        ]);
        DB::table('users')->insert([
            'name' => Str::random(5),
            'lastname_f' => Str::random(5),
            'lastname_m' => Str::random(5),
            'email' => Str::random(8) . '@mail.com',
            'password' => Str::random(15),
            'phone' => mt_rand(1000000000, 9999999999),
            'curp' => Str::random(18),
            'pc' => 'LAPTOP',
            'mobile' => true,
            'internet' => true,
            'mobile_data' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'id_os_pc' => 1,
            'id_os_mobile' => 3,
        ]);
        DB::table('users')->insert([
            'name' => Str::random(5),
            'lastname_f' => Str::random(5),
            'lastname_m' => Str::random(5),
            'email' => Str::random(8) . '@mail.com',
            'password' => Str::random(15),
            'phone' => mt_rand(1000000000, 9999999999),
            'curp' => Str::random(18),
            'pc' => 'LAPTOP',
            'mobile' => true,
            'internet' => true,
            'mobile_data' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'id_os_pc' => 3,
            'id_os_mobile' => 2,
        ]);
        DB::table('users')->insert([
            'name' => Str::random(5),
            'lastname_f' => Str::random(5),
            'lastname_m' => Str::random(5),
            'email' => Str::random(8) . '@mail.com',
            'password' => Str::random(15),
            'phone' => mt_rand(1000000000, 9999999999),
            'curp' => Str::random(18),
            'mobile' => false,
            'internet' => false,
            'mobile_data' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Organizaciones  
        DB::table('organization')->insert([
            'name' => Str::random(5),
            'address' => Str::random(25),
            'email' => Str::random(8) . '@mail.com',
            'phone' => mt_rand(1000000000, 9999999999),
            'id_cat_org' => 1,
            'id_admin' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('organization')->insert([
            'name' => Str::random(5),
            'address' => Str::random(25),
            'email' => Str::random(8) . '@mail.com',
            'phone' => mt_rand(1000000000, 9999999999),
            'id_cat_org' => 4,
            'id_admin' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Usuario tiene organizaciones
        DB::table('users_organizations')->insert([
            'id_user' => 2,
            'id_org' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users_organizations')->insert([
            'id_user' => 4,
            'id_org' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
