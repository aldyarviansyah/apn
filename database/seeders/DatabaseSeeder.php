<?php

namespace Database\Seeders;

use App\Models\AccessRequest;
use App\Models\Activity;
use App\Models\Boat;
use App\Models\Company;
use App\Models\Country;
use App\Models\Ship;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionAndGroupSeeder::class);
        $this->call(PermissionPierAndCategoriesSeeder::class);
        $this->call(PierCategoriesSeeder::class);
        $this->call(PiersSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(CompanyTypesSeeder::class);
        Country::whereIn('name', [
            'INDONESIA',
            'MALAYSIA',
            'PHILIPPINES',
            'SINGAPORE',
            'THAILAND'
        ])->update(['highlighted'=> true]);
        Boat::factory()->count(60)->create();
        Ship::factory()->count(5000)->create();
        AccessRequest::factory()->count(60)->create();
        Company::factory()->count(10)->create();
    }
}
