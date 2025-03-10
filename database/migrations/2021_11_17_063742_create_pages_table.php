<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_name');
            $table->string('page_slug');
            $table->string('page_title')->nullable();
            $table->string('page_title_background_image')->nullable();
            $table->string('page_feature_image')->nullable();
            $table->text('page_content')->nullable();
            $table->enum('is_active', ['Y', 'N'])->nullable()->default('N');
            $table->string('page_meta_keywords')->nullable();
            $table->string('page_meta_desc')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
