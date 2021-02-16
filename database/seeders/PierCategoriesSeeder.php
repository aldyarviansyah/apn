<?php

namespace Database\Seeders;

use App\Models\PierCategory;
use Illuminate\Database\Seeder;

class PierCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PierCategory::create(['name' => 'Coal cargo (VDNi)']);
        PierCategory::create(['name' => 'Export cargo (VDNi)']);
        PierCategory::create(['name' => 'Nickel ore cargo (=>10000 TON VDNi)']);
        PierCategory::create(['name' => 'Nickel ore cargo (8000-10000 TON VDNi)']);
        PierCategory::create(['name' => 'Nickel ore cargo (6000-8000 TON VDNi)']);
        PierCategory::create(['name' => 'Nickel ore cargo (3000-6000 TON VDNi)']);
        PierCategory::create(['name' => 'General cargo (OSS)']);
        PierCategory::create(['name' => 'Cargo construction (OSS)']);
        PierCategory::create(['name' => 'Coal cargo (OSS)']);
        PierCategory::create(['name' => 'Nickel ore cargo (3000-6000 TON OSS)']);
        PierCategory::create(['name' => 'Nickel ore cargo (6000-8000 TON OSS)']);
        PierCategory::create(['name' => 'Nickel ore cargo (8000-10000 TON OSS)']);
        PierCategory::create(['name' => 'Nickel ore cargo (=>10000 TON OSS)']);
    }
}
