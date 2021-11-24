<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'respuesta';

    /**
     * Run the migrations.
     * @table respuesta
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_respuesta');
            $table->string('respuesta')->nullable()->default(null);
            $table->string('fecha_creacion', 45)->nullable()->default(null);
            $table->integer('fk_id_comentario')->nullable()->default(null);
            $table->integer('fk_id_usuario');

            $table->index(["fk_id_comentario"], 'respuesta_comntario_idx');

            $table->index(["fk_id_usuario"], 'respuesta_usuario_idx');


            $table->foreign('fk_id_comentario', 'respuesta_comntario_idx')
                ->references('id_comentario')->on('comentario')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('fk_id_usuario', 'respuesta_usuario_idx')
                ->references('id_usuario')->on('usuario')
                ->onDelete('no action')
                ->onUpdate('no action');
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
