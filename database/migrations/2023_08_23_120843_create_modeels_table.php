<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modeels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');//
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');//
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('text')->nullable();
            $table->string('linkVideo')->nullable();
            $table->string('image')->nullable();
            $table->string('filePDF')->nullable();


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
        Schema::dropIfExists('models');
    }
};
