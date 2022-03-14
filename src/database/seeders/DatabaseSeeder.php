<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            InquiryStatesSeeder::class,
            UserPermissionsSeeder::class,
            MeasuresSeeder::class,
            PrioritiesSeeder::class
        ]);

        \App\Models\User::factory(10)->create();
        \App\Models\Product::factory(10)->create();
        \App\Models\File::factory(10)->create();
        \App\Models\Inquiry::factory(10)->create();
    }
}
