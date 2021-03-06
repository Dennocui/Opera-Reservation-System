<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('TransactionType');
            $table->string('TransID');
            $table->string('TransTime');
            $table->string('TransAmount');
            $table->string('BusinessShortCode');
            $table->string('BillRefNumber');
            $table->string('InvoiceNumber');
            $table->string('MSISDN');
            $table->string('FirstName');
            $table->string('MiddleName')->nullable();
            $table->string('LastName');
            $table->string('OrgAccountBalance');
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
        Schema::dropIfExists('payment');
    }
}
