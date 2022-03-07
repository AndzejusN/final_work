<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrioritiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $priorities = [
            'low',
            'mid',
            'high'
        ];


        foreach ($priorities as $priority) {
            if (!Priority::where('name', $priority)->exists()) {
                Priority::create([
                    'name' => $priority
                ]);
            }
        }
    }
}
