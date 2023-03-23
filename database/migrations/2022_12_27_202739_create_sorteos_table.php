<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sorteos', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->enum('status',[1,2,3])->default(1);
            $table->boolean('grupo')->default(False);
            
            $table->unsignedBigInteger('user_id');
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sorteos');
    }
};
