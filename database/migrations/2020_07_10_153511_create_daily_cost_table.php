<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_cost', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('name');
            $table->double('total_price');
            $table->tinyInteger('state');
            $table->double('arrears')->default(0);
            $table->string('remarks');
            $table->timestamps();
        });

        // 外键约束
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');

            $table->foreignId('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_cost');
    }
}
