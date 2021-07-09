<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transfers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->string('sender_name');
            $table->string('sender_surname');
            $table->string('sender_bank_number');
            $table->string('receiver_name');
            $table->string('receiver_surname');
            $table->string('receiver_bank_number');
            $table->timestamp('transfer_date');
            $table->text('desc');
            $table->unsignedDouble('amount',15,2);
            $table->double('amount_after', 15,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
