<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComunidadTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'comunidad';

    /**
     * Run the migrations.
     * @table comunidad
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_comunidad');
            $table->string('nombre', 45)->nullable()->default(null);
            $table->string('departamento', 45)->nullable()->default(null);
            $table->string('ciudad', 45)->nullable()->default(null);
            $table->integer('telefono_representante')->nullable()->default(null);
            $table->string('nombre_representante', 45)->nullable()->default(null);
            $table->integer('fk_id_usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
