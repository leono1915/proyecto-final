<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialcomprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historialcompras', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->biginteger('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id')->on('proveedores');
            $table->biginteger('id_producto')->unsigned();
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->string('folio');
            $table->string('estatus')->default('pendiente');
            $table->biginteger('numero');
            $table->string('eliminado');
            $table->decimal('cantidadDescontar',40,20);
            $table->decimal('total',10,2);
            $table->biginteger('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->string('serie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historialcompras');
    }
}
