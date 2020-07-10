<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->string('user_id'); // 外键
            $table->string('title'); // 订单名称
            $table->string('customer'); // 订单客户
            $table->date('date'); // 订单日期
            $table->double('sale_total'); // 合计
            $table->double('buy_total');
            $table->double('tax_rate'); // 税率
            $table->double('profit');
            $table->double('profit_rate');
            $table->tinyInteger('state')->default(1); // 1-未结算; 2-已经结清； 3-没有结清
            $table->double('arrears')->default(0);
            $table->string('remarks'); // 备注
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
        Schema::dropIfExists('orders');
    }
}
