<?php

use Illuminate\Database\Seeder;

class ProfileSpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProfileSpecialty::class, 20)->create();
    }
}
