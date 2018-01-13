<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title')->unique();
          $table->longtext('body');
          $table->string('keywords');
          $table->string('permalink')->unique();
          $table->string('publish');
          $table->mediumtext('summary');
          $table->string('summary_image');
          $table->text('summary_caption');
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
        Schema::dropIfExists('blog');
    }
}
