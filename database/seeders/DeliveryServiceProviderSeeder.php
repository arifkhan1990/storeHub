<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DeliveryServiceProvider;

class DeliveryServiceProviderSeeder extends Seeder
{
    public function run()
    {
        DeliveryServiceProvider::factory()->count(20)->create();
    }
}
