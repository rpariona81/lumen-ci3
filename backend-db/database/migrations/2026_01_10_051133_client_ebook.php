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
        Schema::create('t_client_ebook', function (Blueprint $table) {
            $table->bigIncrements('id'); // client_ebook id
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('ebook_id');
            $table->string('client_ebook_categories')->nullable();
            $table->string('client_ebook_tags')->nullable();
            $table->boolean('authorized')->default(true);
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
        Schema::dropIfExists('t_client_ebook');
    }
};
