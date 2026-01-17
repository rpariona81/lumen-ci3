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
        Schema::create('t_ebooks', function (Blueprint $table) {
            $table->bigincrements('id'); // id
            $table->string('ebook_code');
            $table->string('ebook_isbn')->nullable();
            $table->string('ebook_title')->nullable();
            $table->string('ebook_alias')->nullable();
            $table->string('ebook_display')->nullable();
            $table->string('ebook_type')->nullable();
            $table->string('ebook_format')->nullable();
            $table->string('ebook_author')->nullable();
            $table->string('ebook_editorial')->nullable();
            $table->year('ebook_year')->nullable();
            $table->integer('ebook_pages')->nullable();
            $table->string('ebook_front_page')->nullable();
            $table->text('ebook_details')->nullable();
            $table->string('ebook_url')->nullable();
            $table->string('ebook_file')->nullable();
            $table->string('ebook_categories')->nullable();
            $table->string('ebook_tags')->nullable();
            $table->boolean('ebook_available')->default(true);
            $table->unsignedBigInteger('catalog_id')->nullable(); //'catalog_id
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
        Schema::dropIfExists('t_ebooks');
    }
};
