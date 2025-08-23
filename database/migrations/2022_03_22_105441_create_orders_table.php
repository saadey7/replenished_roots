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
            $table->string('receiver_address')->nullable();
            $table->string('amount')->nullable();
            $table->string('sales_tax')->comment('GST 13%')->nullable();
            $table->string('all_delivery_fees')->comment('Packaging Costs + Shipping Costs + Handling Costs')->nullable();
            $table->string('tip')->nullable();
            $table->string('totalAmount')->comment('with all taxes')->nullable();
            $table->string('payment')->nullable();
            $table->string('time_to')->nullable();
            $table->string('time_from')->nullable();
            $table->string('date')->nullable();
            $table->text('comment')->nullable();
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
