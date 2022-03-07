<?php

namespace Database\Seeders;

use App\Models\Measure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeasuresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $measures = [
            'pcs',
            'kg',
            'pkg',
            'thsd'
        ];


        foreach ($measures as $measure) {
            if (!Measure::where('name', $measure)->exists()) {
                Measure::create([
                    'name' => $measure
                ]);
            }
        }
    }
}
