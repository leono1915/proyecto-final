<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialventasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historialventas', function (Blueprint $table) {
            $table->id();
           // $table->string('fecha');
            $table->timestamps();
            $table->bigInteger('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id')->on('clientes');

            $table->bigInteger('id_producto')->unsigned();
            $table->foreign('id_producto')->references('id')->on('productos');
          
            $table->string('folio');
            $table->string('estatus')->default('pendiente');
            $table->biginteger('numero');
            $table->string('eliminado')->default('no');
            $table->double('cantidadDescontar',40,20);
            $table->double('total',40,20);
            $table->string('facturado');
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('pago');
            $table->string('tipodescuento');
            $table->string('credito');
            $table->string('serie');
          

            $table->bigInteger('idcotizacion')->unsigned();
            
           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historialventas');
    }
}
