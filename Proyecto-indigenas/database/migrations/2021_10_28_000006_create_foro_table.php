<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'foro';

    /**
     * Run the migrations.
     * @table foro
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_foro');
            $table->string('nombre', 45)->nullable()->default(null);
            $table->string('contenido', 45)->nullable()->default(null);
            $table->integer('fk_id_usuario');

            $table->index(["fk_id_usuario"], 'foro_usuario_crea_idx');


            $table->foreign('fk_id_usuario', 'foro_usuario_crea_idx')
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
