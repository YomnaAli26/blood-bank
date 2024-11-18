<?php

namespace Database\Seeders;

use App\Models\BloodType;
use App\Models\Governorate;
use Illuminate\Database\Seeder;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BloodType::factory(10)->create();


    }
}
