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
        Schema::create('t_client_career', function (Blueprint $table) {
            $table->bigIncrements('id'); // client_career id
            $table->string('client_career_name');
            $table->string('client_career_description')->nullable();
            $table->string('client_career_display')->nullable();
            $table->string('client_career_related')->nullable();
            $table->boolean('career_available')->default(true);
            $table->unsignedBigInteger('client_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('t_client_career');
    }
};
