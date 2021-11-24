<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentarioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'comentario';

    /**
     * Run the migrations.
     * @table comentario
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_comentario');
            $table->string('comentario', 45)->nullable()->default(null);
            $table->string('fecha_creacion', 45)->nullable()->default(null);
            $table->integer('fk_d_foro')->nullable()->default(null);
            $table->integer('fk_id_usuario');

            $table->index(["fk_id_usuario"], 'usuario_comentario_idx');

            $table->index(["fk_d_foro"], 'foro_comentario_idx');


            $table->foreign('fk_id_usuario', 'usuario_comentario_idx')
                ->references('id_usuario')->on('usuario')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('fk_d_foro', 'foro_comentario_idx')
                ->references('id_foro')->on('foro')
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
