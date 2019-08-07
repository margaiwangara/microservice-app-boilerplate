<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->mediumText('address');
            $table->string('phone', 15);
            $table->decimal('lat', 10, 8);
            $table->decimal('lon', 11, 8);
            $table->integer('city_id');
            $table->integer('country_id');
            $table->integer('profile_id');
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
        Schema::dropIfExists('profile_information');
    }
}
