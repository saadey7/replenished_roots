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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('order_date')->nullable();
            $table->string('receiver_name')->nullable();
            $table->string('receiver_company_name')->nullable();
            $table->string('receiver_country')->nullable();
            $table->text('receiver_address')->nullable();
            $table->string('receiver_city')->nullable();
            $table->string('receiver_district')->nullable();
            $table->string('receiver_zipCode')->nullable();
            $table->string('receiver_phoneNo')->nullable();
            $table->string('receiver_email')->nullable();
            $table->string('amount')->nullable();
            $table->text('comment')->nullable();
            $table->boolean('apply_coupon')->comment('1 for applied or 0 for not applied')->default(0);
            $table->string('order_status')->comment('Pending/Completed')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
};