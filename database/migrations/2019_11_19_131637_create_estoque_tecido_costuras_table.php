<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstoqueTecidoCosturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estoque_tecido_costuras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descricao');
            $table->string('cod_item');
            $table->string('ean_item');
            $table->string('reservado');
            $table->string('pedido')->nullable();
            $table->string('metragem');
            $table->string('estoque_min');
            $table->string('estante');
            $table->float('preco');
            $table->unsignedBigInteger('fornecedor_id');
            $table->foreign('fornecedor_id')->references('id')
                ->on('fornecedors')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estoque_tecido_costuras');
    }
}
