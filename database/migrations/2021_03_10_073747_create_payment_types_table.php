<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uid')->nullable();

            $table->string('name');
            $table->string('short_name')->unique()->nullable();
            $table->string('number')->unique()->nullable();
            $table->string('type')->comment('Personal | Agent | Merchant | Current | Salary');
            $table->text('description')->nullable();
            $table->text('photo')->nullable();

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
        Schema::dropIfExists('payment_types');
    }
}
