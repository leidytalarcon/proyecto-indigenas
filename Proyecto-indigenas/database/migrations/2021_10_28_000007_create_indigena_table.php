<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndigenaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'indigena';

    /**
     * Run the migrations.
     * @table indigena
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_indigena');
            $table->integer('documento')->nullable()->default(null);
            $table->string('nombre', 45)->nullable()->default(null);
            $table->date('nacimiento')->nullable()->default(null);
            $table->string('direccion', 45)->nullable()->default(null);
            $table->string('correo', 45)->nullable()->default(null);
            $table->string('telefono', 45)->nullable()->default(null);
            $table->integer('fk_id_comunidad');
            $table->integer('fk_id_usuario')->nullable();
            $table->integer('fk_id_tipo_documento')->nullable();

            $table->index(["fk_id_usuario"], 'indigena_usuario_crea_idx');

            $table->index(["fk_id_comunidad"], 'indigena_comunidad_idx');

            $table->index(["fk_id_tipo_documento"], 'indigena_tipo_documento_idx');


            $table->foreign('fk_id_usuario', 'indigena_usuario_crea_idx')
                ->references('id_usuario')->on('usuario')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('fk_id_comunidad', 'indigena_comunidad_idx')
                ->references('id_comunidad')->on('comunidad')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('fk_id_tipo_documento', 'indigena_tipo_documento_idx')
                ->references('id_tipo_documento')->on('tipo_documento')
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
