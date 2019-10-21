<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneroObraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genero_obra', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('genero_id');
            $table->unsignedBigInteger('obra_id');
            $table->foreign('genero_id')
                ->references('id')
                ->on('generos')
                ->onDelete('cascade');
            $table->foreign('obra_id')
                ->references('id')
                ->on('obras')
                ->onDelete('cascade');
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
        Schema::dropIfExists('genero_obra');
    }
}
