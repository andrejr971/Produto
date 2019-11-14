<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('preco')->nullable();
            $table->string('descricao');
            $table->integer('quantidade')->nullable();
            $table->string('sku')->nullable();
            $table->string('observacao')->nullable();
            $table->unsignedBigInteger('categoria_produto_id');
            $table->foreign('categoria_produto_id')->references('id')
                ->on('categoria_produtos')->onDelete('cascade')->nullable();
            $table->unsignedBigInteger('tipo_produto_id');
            $table->foreign('tipo_produto_id')->references('id')
                ->on('tipo_produtos')->onDelete('cascade')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('produtos');
    }
}
