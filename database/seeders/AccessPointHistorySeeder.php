<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AccessPointHistory;

class AccessPointHistorySeeder extends Seeder
{
    public function run()
    {
        AccessPointHistory::factory()->count(100)->create();
    }
}
