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
            $table->string('reservado');
            $table->string('pedido');
            $table->string('metragem');
            $table->string('estante');
            $table->unsignedBigInteger('fornecedor_id');
            $table->foreign('fornecedor_id')->references('id')
                ->on('fornecedores')->onDelete('cascade');
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
