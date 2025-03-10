<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_media', function (Blueprint $table) {
            $table->id();
            $table->string('contact_info_address')->nullable();
            $table->string('contact_info_email')->nullable();
            $table->string('contact_info_phone')->nullable();
            $table->string('social_media_facebook_link')->nullable();
            $table->string('social_media_linkedin_link')->nullable();
            $table->string('social_media_instagram_link')->nullable();
            $table->text('copyright')->nullable();
            // $table->enum('is_active', ['Y', 'N'])->default('N');
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
        Schema::dropIfExists('social_media');
    }
}
