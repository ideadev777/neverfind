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
            $table->smallInteger('service_id');            
            $table->string('name');
            $table->smallInteger('status');            
            $table->string('email');
            $table->string('address');
            $table->string('mobile_number');
            $table->string('pay_email');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->time('start_time') ;
            $table->time('end_time') ;
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
}
