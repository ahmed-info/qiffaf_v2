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
        Schema::create('modeeldetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modeel_id');//
            $table->foreign('modeel_id')->references('id')->on('modeels')->onDelete('cascade');//
            $table->string('title')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('modeldetails');
    }
};
