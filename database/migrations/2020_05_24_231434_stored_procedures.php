<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StoredProcedures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Usuarios
        DB::unprepared('
            DROP PROCEDURE IF EXISTS nuevo_usuario;
            
            CREATE PROCEDURE `nuevo_usuario` (
                IN `n_name` varchar(255), 
                IN `n_lstf` varchar(255),
                IN `n_lstm` varchar(255),
                IN `n_email` varchar(255),
                IN `n_password` varchar(255),
                IN `n_phone` varchar(255),
                IN `n_curp` varchar(255),
                IN `n_pc` varchar(255),
                IN `n_mobile` boolean,
                IN `n_internet` boolean,
                IN `n_mobile_data` boolean,
                IN `n_id_os_pc` int,
                IN `n_id_os_mobile` int
                )
            BEGIN
                INSERT INTO users (name, lastname_f, lastname_m, email, password, phone, curp, pc, mobile, internet, mobile_data, id_os_pc, id_os_mobile)
                VALUES (n_name, n_lstf, n_lstm, n_email, n_password, n_phone, n_curp, n_pc, n_mobile, n_internet, n_mobile_data, n_id_os_pc, n_id_os_mobile);
            END
        ');
        DB::unprepared('
            DROP PROCEDURE IF EXISTS editar_usuario;
            
            CREATE PROCEDURE `editar_usuario` (
                IN `e_id_user` int, 
                IN `n_name` varchar(255), 
                IN `n_lstf` varchar(255),
                IN `n_lstm` varchar(255),
                IN `n_email` varchar(255),
                IN `n_password` varchar(255),
                IN `n_phone` varchar(255),
                IN `n_curp` varchar(255),
                IN `n_pc` varchar(255),
                IN `n_mobile` boolean,
                IN `n_internet` boolean,
                IN `n_mobile_data` boolean,
                IN `n_id_os_pc` int,
                IN `n_id_os_mobile` int
                )
            BEGIN
                UPDATE users SET
                    name = n_name,
                    lastname_f = n_lstf,
                    lastname_m = n_lstm,
                    email = n_email,
                    password = n_password,
                    phone = n_phone,
                    curp = n_curp,
                    pc = n_pc,
                    mobile = n_mobile,
                    internet = n_internet,
                    mobile_data = n_mobile_data,
                    id_os_pc = n_id_os_pc,
                    id_os_mobile = n_id_os_mobile
                    WHERE id_user = e_id_user;
            END
        ');
        DB::unprepared('
            DROP PROCEDURE IF EXISTS leer_usuarios;
            
            CREATE PROCEDURE `leer_usuarios` ()
            BEGIN
                SELECT 
                *
                FROM
                users;
            END
        ');
        DB::unprepared('
            DROP PROCEDURE IF EXISTS detalle_usuario;
            
            CREATE PROCEDURE `detalle_usuario` (
                IN `d_id_user` int
            )
            BEGIN
                SELECT 
                *
                FROM
                users
                WHERE
                d_id_user = id_user;
            END
        ');

        // Organizaciones
        DB::unprepared('
            DROP PROCEDURE IF EXISTS nueva_org;
            
            CREATE PROCEDURE `nueva_org` (
                IN `n_name` varchar(255), 
                IN `n_id_cat_org` int,
                IN `n_address` varchar(255),
                IN `n_email` varchar(255),
                IN `n_telefono` varchar(255)
                )
            BEGIN
                INSERT INTO users (name, id_cat_org, address, email, telefono)
                VALUES (n_name, n_id_car_org, n_address, n_email, n_telefono);
            END
        ');
        DB::unprepared('
            DROP PROCEDURE IF EXISTS editar_org;
            
            CREATE PROCEDURE `editar_org` (
                IN `e_id_org` int,
                IN `n_name` varchar(255), 
                IN `n_id_cat_org` int,
                IN `n_address` varchar(255),
                IN `n_email` varchar(255),
                IN `n_telefono` varchar(255)
                )
            BEGIN
                UPDATE organization SET 
                    name = n_name, 
                    id_cat_org = n_id_car_org, 
                    address = n_address, 
                    email = n_email,
                    telefono = n_telefono
                WHERE e_id_org = id_org;
            END
        ');
        DB::unprepared('
            DROP PROCEDURE IF EXISTS leer_org;
            
            CREATE PROCEDURE `leer_org` ()
            BEGIN
                SELECT 
                *
                FROM
                organization;
            END
        ');
        DB::unprepared('
            DROP PROCEDURE IF EXISTS detalle_org;
            
            CREATE PROCEDURE `detalle_org` (
                IN `d_id_org` int
            )
            BEGIN
                SELECT 
                *
                FROM
                organization
                WHERE
                d_id_org = id_org;
            END
        ');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS nuevo_usuario;');
        DB::unprepared('DROP PROCEDURE IF EXISTS editar_usuario;');
        DB::unprepared('DROP PROCEDURE IF EXISTS leer_usuarios;');
        DB::unprepared('DROP PROCEDURE IF EXISTS detalle_usuario;');

        DB::unprepared('DROP PROCEDURE IF EXISTS nuevo_org;');
        DB::unprepared('DROP PROCEDURE IF EXISTS editar_org;');
        DB::unprepared('DROP PROCEDURE IF EXISTS leer_org;');
        DB::unprepared('DROP PROCEDURE IF EXISTS detalle_org;');
    }
}
