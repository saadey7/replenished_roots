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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->nullable();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('price')->nullable();
            $table->string('expire_date')->nullable();
            $table->text('tags')->nullable();
            $table->text('categories')->nullable();
            $table->boolean('is_discount')->default(0)->nullabe();
            $table->string('discount')->nullable()->comment('discount percentage');
            $table->string('discount_price')->nullable()->comment('discount price');
            $table->longText('description')->nullable();
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
};