<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Pier;
use Illuminate\Database\Seeder;

class PiersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = ['west', 'east', 'center'];
        for($i=1; $i<89;$i++) {
            Pier::create(['number' => $i, 'section' => $sections[rand(0,2)], 'pier_category_id' => rand(1,13)]);
        }
    }
}
