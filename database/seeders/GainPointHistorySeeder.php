<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GainPointHistory;

class GainPointHistorySeeder extends Seeder
{
    public function run()
    {
        GainPointHistory::factory()->count(100)->create();
    }
}
