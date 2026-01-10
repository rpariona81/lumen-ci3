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
        Schema::create('t_offer_clients', function (Blueprint $table) {
            $table->bigIncrements(column: 'id'); // id
            $table->unsignedBigInteger('client_id');
            $table->string(column: 'career_offered');   // e.g., Computer Science
            $table->string(column: 'level_offered')->nullable();    // e.g., Bachelor, Master
            $table->string(column: 'career_timeframe')->nullable();     // duration
            $table->string(column: 'knowledge_area')->nullable();     // duration
            $table->unsignedBigInteger(column: 'career_id')->nullable();   // e.g., Engineering, Arts
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
        Schema::dropIfExists('t_offer_clients');
    }
};
