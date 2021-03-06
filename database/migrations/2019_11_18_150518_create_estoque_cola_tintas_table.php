<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstoqueColaTintasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estoque_cola_tintas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descricao');
            $table->string('cod_item');
            $table->string('ean_item');
            $table->string('estante');
            $table->string('un_medida');
            $table->string('vol');
            $table->float('qtd');
            $table->float('estoque_ideal');
            $table->float('estoque_min');
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
        Schema::dropIfExists('estoque_cola_tintas');
    }
}
