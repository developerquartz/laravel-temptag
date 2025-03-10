<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id');
            $table->string('product_name');
            $table->bigInteger('product_quantity')->nullable()->default(0);
            $table->double('product_price')->nullable()->default(0);
            $table->text('product_price_json')->nullable()->default('');
            $table->bigInteger('product_quantity_for_sale')->nullable()->default(0);
            $table->bigInteger('product_available')->nullable()->default(0);
            $table->text('product_detail')->nullable();
            $table->text('product_description')->nullable();
            $table->text('product_specification')->nullable();
            $table->text('product_features')->nullable();
            $table->string('product_feature_image')->nullable()->default('');
            $table->text('additional_images')->nullable();
            $table->enum('on_home_page', ['Y', 'N'])->default('N');
            $table->enum('is_active', ['Y', 'N'])->default('N');
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
        Schema::dropIfExists('products');
    }
}
