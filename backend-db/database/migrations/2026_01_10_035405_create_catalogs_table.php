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
        Schema::create('t_catalogs', function (Blueprint $table) {
            $table->bigIncrements('id'); // id
            $table->string('catalog_name')->unique();
            $table->string('catalog_description')->nullable();
            $table->string('catalog_alias');
            $table->string('catalog_display')->nullable();
            $table->string('catalog_code')->nullable()->unique();
            $table->string('catalog_ico')->nullable();
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
        Schema::dropIfExists('t_catalogs');
    }
};
