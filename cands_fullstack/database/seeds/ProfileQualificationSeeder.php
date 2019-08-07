<?php

use Illuminate\Database\Seeder;

class ProfileQualificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProfileQualification::class, 20)->create();
    }
}
