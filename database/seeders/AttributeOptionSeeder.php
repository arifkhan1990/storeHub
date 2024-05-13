<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AttributeOption;

class AttributeOptionSeeder extends Seeder
{
    public function run()
    {
        AttributeOption::factory()->count(50)->create();
    }
}
