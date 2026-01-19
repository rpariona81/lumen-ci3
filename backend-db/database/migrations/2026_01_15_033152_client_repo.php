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
        Schema::create('t_client_repository', function (Blueprint $table) {
            $table->bigIncrements('id'); // client_ebook id
            $table->string('repo_code')->nullable()->unique();
            $table->string('repo_isbn')->nullable()->unique();
            $table->string('repo_title')->nullable();
            $table->string('repo_alias')->nullable();
            $table->string('repo_display')->nullable();
            $table->string('repo_type')->nullable();
            $table->string('repo_format')->nullable();
            $table->string('repo_author')->nullable();
            $table->string('repo_editorial')->nullable();
            $table->year('repo_year')->nullable();
            $table->integer('repo_pages')->nullable();
            $table->string('repo_front_page')->nullable();
            $table->text('repo_details')->nullable();
            $table->string('repo_url')->nullable();
            $table->string('repo_file')->nullable();
            $table->string('repo_categories')->nullable();
            $table->string('repo_tags')->nullable();
            $table->boolean('repo_available')->default(true);
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
        Schema::dropIfExists('t_client_repository');
    }
};
