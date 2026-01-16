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
        Schema::create('t_clients', function (Blueprint $table) {
            $table->bigIncrements('id'); // cliente id
            $table->string('client_ruc_uid')->nullable()->unique();
            $table->string('client_email')->unique();
            $table->string('client_name')->unique();
            $table->string('client_logo')->nullable();
            $table->timestamp('client_verified_at')->nullable();
            $table->string('client_display');
            $table->boolean('status')->default(true);
            $table->date('client_date_license')->nullable();
            $table->string('client_weburl')->nullable();
            $table->string('client_subdomain')->nullable();
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
        Schema::dropIfExists('t_clients');
    }
};
