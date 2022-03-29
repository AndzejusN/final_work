<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models;


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

        Models\User::factory(10)->create();
        Models\User::factory()->state(new Sequence(
            [
                'name' => 'Admin',
                'email' => 'admin@admin.lt',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'permission' => 'Admin',
            ],
            [
                'name' => 'Sales',
                'email' => 'sales@sales.lt',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'permission' => 'Sales',
            ],
            [
                'name' => 'Purchase',
                'email' => 'purchase@purchase.lt',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'permission' => 'Purchase',
            ]
        ))->count(3)->create();


        Models\Product::factory(10)->create();
        Models\File::factory(10)->create();
        Models\Inquiry::factory(10)->create();
    }
}
