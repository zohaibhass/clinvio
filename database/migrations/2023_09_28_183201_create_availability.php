<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       schema::create('availabilities',function(Blueprint $table){
        // $table->engine = 'InnoDB';
        $table->id('ava_id');
        $table->unsignedBigInteger('Doctor_id');
        $table->foreign('Doctor_id')->references('Doctor_id')->on('doctors')->onDelete('cascade');
        $table->string('day');
        $table->time('start_time');
        $table->time('end_time');

    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
