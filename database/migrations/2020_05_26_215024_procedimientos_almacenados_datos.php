<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ProcedimientosAlmacenadosDatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $crear_dato = 'CREATE PROCEDURE `crearNuevoDato` (
            IN `nuevaTemperatura` boolean, 
            IN `nuevaTos` boolean, 
            IN `nuevaObservacion` varchar(255),
            IN `nuevaFecha` datetime,
            IN `nuevoUsuarioOrg` int
            )
        BEGIN
            INSERT INTO datos_biometricos (temp, tos, obs, fecha, id_usr_org)
            VALUES (nuevaTemperatura, nuevaTos, nuevaObservacion, nuevaFecha, nuevoUsuarioOrg);
        END';
        DB::unprepared('DROP PROCEDURE IF EXISTS crearNuevoDato;');
        DB::unprepared($crear_dato);

        $leer_dato = 'CREATE PROCEDURE `leerDatos` ()
            BEGIN
                SELECT *
                FROM datos_biometricos;
            END';
        DB::unprepared('DROP PROCEDURE IF EXISTS leerDatos;');
        DB::unprepared($leer_dato);

        $editar_dato = 'CREATE PROCEDURE `editarDato` (
            IN `idDatoEditar` int,
            IN `nuevaTemperatura` boolean, 
            IN `nuevaTos` boolean, 
            IN `nuevaObservacion` varchar(255),
            IN `nuevaFecha` datetime,
            IN `nuevoUsuarioOrg` int
            )
        BEGIN
            UPDATE datos_biometricos SET 
                temp = nuevaTemperatura,
                tos = nuevaTos,
                obs = nuevaObservacion,
                fecha = nuevaFecha,
                id_usr_org = nuevoUsuarioOrg
            WHERE id_dat_bio = idDatoEditar;   
        END';
        DB::unprepared('DROP PROCEDURE IF EXISTS editarDato;');
        DB::unprepared($editar_dato);

        $eliminar_dato = 'CREATE PROCEDURE `eliminarDato` (
            IN `idDatoEliminar` int
            )
        BEGIN
            DELETE FROM datos_biometricos
            WHERE id_dat_bio = idDatoEliminar;
        END';
        DB::unprepared('DROP PROCEDURE IF EXISTS eliminarDato;');
        DB::unprepared($eliminar_dato);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS `eliminarDato;`');
        DB::unprepared('DROP PROCEDURE IF EXISTS `editarDato;`');
        DB::unprepared('DROP PROCEDURE IF EXISTS `leerDato;`');
        DB::unprepared('DROP PROCEDURE IF EXISTS `crearDato;`');
    }
}
