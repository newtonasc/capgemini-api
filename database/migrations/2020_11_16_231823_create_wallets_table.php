<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->increments('wallet_id');
            $table->integer('id_user')->unsigned();
            $table->integer('user_destination_id')->unsigned()->nullable();
            $table->integer('id_type')->unsigned();
            $table->string('transaction_id');
            $table->decimal('balance',10, 2);
            $table->decimal('amount',10, 2);
            $table->timestamp('transaction_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('id_type')->references('type_id')->on('types')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallets');
    }
}
