<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedidaProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medida_produto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('largura')->nullable();
            $table->string('altura')->nullable();
            $table->string('profundidade')->nullable();
            $table->unsignedBigInteger('produto_id');
            $table->foreign('produto_id')->references('id')
                ->on('produtos');
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
        Schema::dropIfExists('medida_produto');
    }
}
