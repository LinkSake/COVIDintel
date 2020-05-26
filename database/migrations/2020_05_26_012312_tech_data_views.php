<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TechDataViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            DROP VIEW IF EXISTS panel_admin;

            CREATE 
                ALGORITHM = UNDEFINED 
            VIEW `develop7_ulsa`.`panel_admin` AS
                SELECT 
                    `uo`.`id_usr_org` AS `id_usr_org`,
                    `u`.`id_user` AS `id_user`,
                    `u`.`name` AS `name`,
                    `u`.`lastname_f` AS `lasname_f`,
                    `u`.`lastname_m` AS `lasname_m`,
                    `u`.`email` AS `email`,
                    `u`.`phone` AS `phone`,
                    `u`.`curp` AS `curp`,
                    `u`.`pc` AS `pc`,
                    `u`.`mobile` AS `mobile`,
                    `u`.`internet` AS `internet`,
                    `u`.`mobile_data` AS `mobile_data`,
                    `op`.`os` AS `os_pc`,
                    `om`.`os` AS `os_mobile`,
                    `o`.`id_org` AS `id_org`,
                    `o`.`name` AS `org`
                FROM
                    (((`develop7_ulsa`.`users_organizations` `uo`
                    LEFT JOIN `develop7_ulsa`.`organization` `o` ON ((`uo`.`id_org` = `o`.`id_org`)))
                    LEFT JOIN `develop7_ulsa`.`users` `u` ON ((`uo`.`id_user` = `u`.`id_user`)))
                    LEFT JOIN `develop7_ulsa`.`cat_org` `co` ON ((`o`.`id_cat_org` = `co`.`id_cat_org`)))
                    LEFT JOIN `develop7_ulsa`.`os_mobile` `om` ON ((`u`.`id_os_mobile` = `om`.`id_os_mobile`))
                    LEFT JOIN `develop7_ulsa`.`os_pc` `op` ON ((`u`.`id_os_pc` = `op`.`id_os_pc`))
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW IF EXISTS panel_admin;');
    }
}
