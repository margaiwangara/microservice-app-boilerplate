<?php

use Illuminate\Database\Seeder;
use App\ProfileCategory;
class ProfileCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProfileCategory::class, 6)->create();
        // ProfileCategory::create([
        //     'name' => 'preacher'
        // ]);

        // ProfileCategory::create([
        //     'name' => 'mentor'
        // ]);

        // ProfileCategory::create([
        //     'name' => 'motivational speaker'
        // ]);

        // ProfileCategory::create([
        //     'name' => 'musician'
        // ]);
    }
}
