<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Schema\Blueprint;

class CreateOrganisationCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organisation_categories', function (Blueprint $collection) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organisation_categories', function (Blueprint $collection) {
            //
        });
    }
}
