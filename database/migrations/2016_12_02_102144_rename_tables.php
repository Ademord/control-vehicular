<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // COINCIDENCIAS
        $currentTableName = 'registro';
        $newTableName = 'coincidencias';
        Schema::rename($currentTableName, $newTableName);
        // MATRICULAS
        $currentTableName = 'placa';
        $newTableName = 'matriculas';
        Schema::rename($currentTableName, $newTableName);
        // PROPIETARIOS
        $currentTableName = 'miembro';
        $newTableName = 'propietarios';
        Schema::rename($currentTableName, $newTableName);
        // LUGARES
        $currentTableName = 'lugar';
        $newTableName = 'lugares';
        Schema::rename($currentTableName, $newTableName);
        // CAMARAS
        $currentTableName = 'camara';
        $newTableName = 'camaras';
        Schema::rename($currentTableName, $newTableName);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // COINCIDENCIAS
        $currentTableName = 'registro';
        $newTableName = 'coincidencias';
        Schema::rename($newTableName, $currentTableName);
        // MATRICULAS
        $currentTableName = 'placa';
        $newTableName = 'matriculas';
        Schema::rename($newTableName, $currentTableName);
        // PROPIETARIOS
        $currentTableName = 'miembro';
        $newTableName = 'propietarios';
        Schema::rename($newTableName, $currentTableName);
        // LUGARES
        $currentTableName = 'lugar';
        $newTableName = 'lugares';
        Schema::rename($newTableName, $currentTableName);
        // CAMARAS
        $currentTableName = 'camara';
        $newTableName = 'camaras';
        Schema::rename($newTableName, $currentTableName);
    }
}
