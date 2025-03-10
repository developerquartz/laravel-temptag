<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('blog_category_id');
            $table->string('blog_name');
            $table->string('blog_slug');
            $table->string('blog_title')->nullable();
            $table->string('blog_title_background_image')->nullable();
            $table->string('blog_feature_image')->nullable();
            $table->text('blog_content')->nullable();
            $table->enum('is_active', ['Y', 'N'])->nullable()->default('N');
            $table->string('blog_meta_keywords')->nullable();
            $table->string('blog_meta_desc')->nullable();
            $table->text('additional_images')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
