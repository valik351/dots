<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('err_code')->nullable();
            $table->string('err_description')->nullable();
            $table->string('version')->nullable();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->string('err_erc')->nullable();
            $table->string('redirect_to')->nullable();
            $table->string('token')->nullable();
            $table->string('card_token')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('public_key')->nullable();
            $table->string('acq_id')->nullable();
            $table->string('order_id')->nullable();
            $table->string('liqpay_order_id')->nullable();
            $table->string('description')->nullable();
            $table->string('sender_phone')->nullable();
            $table->string('sender_card_mask2')->nullable();
            $table->string('sender_card_bank')->nullable();
            $table->string('sender_card_country')->nullable();
            $table->string('ip')->nullable();
            $table->string('info')->nullable();
            $table->string('customer')->nullable();
            $table->decimal('amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('sender_commission')->nullable();
            $table->string('receiver_commission')->nullable();
            $table->string('agent_commission')->nullable();
            $table->string('amount_debit')->nullable();
            $table->string('amount_credit')->nullable();
            $table->string('commission_debit')->nullable();
            $table->string('commission_credit')->nullable();
            $table->string('currency_debit')->nullable();
            $table->string('currency_credit')->nullable();
            $table->string('sender_bonus')->nullable();
            $table->string('amount_bonus')->nullable();
            $table->string('refund_amount')->nullable();
            $table->string('completion_date')->nullable();
            $table->string('authcode_debit')->nullable();
            $table->string('authcode_credit')->nullable();
            $table->string('rrn_debit')->nullable();
            $table->string('rrn_credit')->nullable();
            $table->string('arrn_debit')->nullable();
            $table->string('arrn_credit')->nullable();
            $table->string('verifycode')->nullable();
            $table->string('action')->nullable();
            $table->string('is_3ds')->nullable();
            $table->string('product_url')->nullable();
            $table->string('product_category')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_description')->nullable();

            $table->softDeletes();
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
        Schema::drop('transactions');
    }
}
