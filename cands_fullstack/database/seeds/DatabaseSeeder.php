<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ProfileCategoryTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
        $this->call(ProfileInformationSeeder::class);
        $this->call(ProfileQualificationSeeder::class);
        $this->call(ProfileSpecialtySeeder::class);

    }
}
