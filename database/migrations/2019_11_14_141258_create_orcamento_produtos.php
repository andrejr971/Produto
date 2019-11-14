<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrcamentoProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orcamento_produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('orcamento_id');
            $table->foreign('orcamento_id')->references('id')
                ->on('orcamentos');
            $table->integer('produto_id')->unsigned();
            $table->integer('categoria_id')->unsigned();
            $table->integer('qtd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orcamento_produtos');
    }
}
