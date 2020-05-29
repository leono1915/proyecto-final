<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizaciontemporalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciontemporals', function (Blueprint $table) {
            $table->id();
            $table->biginteger('cantidad');
            $table->string('descripcion');
            $table->decimal('precio',10,2);
            $table->decimal('subtotal',10,2);
            $table->decimal('iva',10,2);
            $table->decimal('total',10,2);
            $table->biginteger('id_producto')->unsigned();
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->decimal('cantidadDescontar',40,20);
            $table->decimal('kilos',10,2);
            $table->biginteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotizaciontemporals');
    }
}
