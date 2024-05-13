<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DeliveryInfo;

class DeliveryInfoSeeder extends Seeder
{
    public function run()
    {
        DeliveryInfo::factory()->count(250)->create();
    }
}
