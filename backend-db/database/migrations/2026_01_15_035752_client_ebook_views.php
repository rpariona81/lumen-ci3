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
        Schema::create('t_ebooks_views', function (Blueprint $table) {
            $table->bigincrements('id'); // id
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('ebook_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('viewed')->default(true);
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
        //
        Schema::dropIfExists('t_ebooks_views');
    }
};
