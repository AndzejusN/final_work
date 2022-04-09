<?php

namespace Database\Seeders;

use App\Models\InquiryState;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InquiryStatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $states = [
            'Empty',
            'Partly',
            'Fully',
            'Done',
        ];

        foreach ($states as $state) {
            if (!InquiryState::where('name', $state)->exists()) {
                InquiryState::create([
                    'name' => $state
                ]);
            }
        }
    }
}
