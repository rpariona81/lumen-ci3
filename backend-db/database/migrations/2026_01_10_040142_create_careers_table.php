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
        Schema::create('t_careers', function (Blueprint $table) {
            $table->bigIncrements('id'); // id
            $table->string('career_name');
            $table->string('career_description');  
            $table->string('career_code');
            $table->string('career_alias');
            $table->string('career_display');
            $table->string('career_related');
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
        Schema::dropIfExists('t_careers');
    }
};
