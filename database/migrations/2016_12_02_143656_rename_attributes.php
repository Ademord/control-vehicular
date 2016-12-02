<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('camaras', function($table)
        {
            $table->string('recolector')->nullable();
            $table->boolean('estado')->nullable();
        });
        Schema::table('coincidencias', function($table)
        {
            $table->renameColumn('miembro', 'propietario');
            $table->renameColumn('placa', 'matricula');
        });
        Schema::table('propietarios', function($table)
        {
            $table->renameColumn('cod_administrativo', 'codigo');
        });
        Schema::table('matriculas', function($table)
        {
            $table->renameColumn('miembro_id', 'propietario_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('camaras', function($table)
        {
            $table->dropColumn('recolector');
            $table->dropColumn('estado');
        });
        Schema::table('coincidencias', function($table)
        {
            $table->renameColumn('propietario', 'miembro');
            $table->renameColumn('matricula', 'placa');
        });
        Schema::table('propietarios', function($table)
        {
            $table->renameColumn('codigo', 'cod_administrativo');
        });
        Schema::table('matriculas', function($table)
        {
            $table->renameColumn('propietario_id', 'miembro_id');
        });
    }
}
