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
            $table->unsignedBigInteger('uid')->nullable();
            $table->string('sku_id')->nullable();
            $table->string('barcode_id')->nullable();

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');

            $table->string('title')->nullable();
            $table->text('slug')->unique()->nullable();
            $table->longText('description')->nullable();

            $table->double('discount',8,2)->nullable();
            $table->double('bill_amount',8,2)->nullable();

            $table->string('status')->nullable()->default(\App\Models\Settings::STATUS_ACTIVE);

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
        Schema::dropIfExists('products');
    }
}
