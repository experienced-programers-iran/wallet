<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->integer('type_enum')->nullable();
            $table->bigInteger('amount');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('order_id')->on('orders')->references('id');
            $table->foreign('payment_id')->on('payments')->references('id');

            $table->index(['user_id', 'amount', 'order_id', 'type_enum']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
