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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('cedula');
            $table->string('name');
            $table->string('zone');
            $table->string('phone');
            $table->enum('status',[1,2,3])->default(1);
            
            $table->unsignedBigInteger('sorteo_id');
            $table->unsignedBigInteger('grupo_id')->nullable();
            
            $table->foreign('sorteo_id')->references('id')->on('sorteos')->onDelete('cascade');
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('set null');
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
        Schema::dropIfExists('clientes');
    }
};
