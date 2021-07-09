<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',30);
            $table->string('surname',50);
            $table->unsignedBigInteger('phone_number')->unique();
            $table->string('address',80);
            $table->unsignedBigInteger('bank_number');
            $table->unsignedBigInteger('credit_card_number');
            $table->double('balance', 15,2);
            $table->string('account_type');
            $table->double('credit');
            $table->date('birth_date');
            $table->string('email')->unique();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
