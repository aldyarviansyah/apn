<?php

namespace Database\Seeders;

use App\Models\RoleExtend;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleExtend::create(['name' => 'Administrator']);
        RoleExtend::create(['name' => 'Local agent']);
        RoleExtend::create(['name' => 'Field staff']);
        RoleExtend::create(['name' => 'Mine staff']);
        RoleExtend::create(['name' => 'Virtue staff']);
        RoleExtend::create(['name' => 'Vessel owner']);
    }
}
