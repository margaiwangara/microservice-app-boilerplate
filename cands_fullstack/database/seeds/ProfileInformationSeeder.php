<?php

use Illuminate\Database\Seeder;

class ProfileInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProfileInformation::class, 20)->create();
    }
}
