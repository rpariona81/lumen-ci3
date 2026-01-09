<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TRoleUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_role_user', function (Blueprint $table) {
            $table->bigIncrements('id'); // role_user id
            $table->unsignedBigInteger('role_id');       // For MySQL 8.0 use string('name', 125);
            $table->unsignedBigInteger('user_id'); // For MySQL 8.0 use string('guard_name', 125);
            $table->unsignedBigInteger('verified')->default(true);
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
        Schema::dropIfExists('t_role_user');
    }
}
