<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMongoconnectionDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mongoconnection', function (Blueprint $collection) {
            $collection->unique('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mongoconnection', function (Blueprint $collection) {
            $collection->drop();
        });
    }
}
