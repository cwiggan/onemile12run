<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sign_ups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 250);
            $table->string('last_name', 250);
            $table->string('email', 200);
            $table->string('phone', 10);
            $table->string('address');
            $table->string('city', 150);
            $table->string('state',2);
            $table->date('birth_date');
            $table->string('gender',1);
            $table->string('emergency_name');
            $table->string('emergency_phone');
            $table->integer('zip_code');
            $table->integer('race_id');
            $table->string('t_shirt');
            $table->string('transaction_id');
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
        Schema::dropIfExists('sign_ups');
    }
}
