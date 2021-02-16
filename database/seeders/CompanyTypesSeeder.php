<?php

namespace Database\Seeders;

use App\Models\CompanyType;
use Illuminate\Database\Seeder;

class CompanyTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyType::create(['name' => 'Contractor']);
        CompanyType::create(['name' => 'DT Logistic']);
        CompanyType::create(['name' => 'Local Agency']);
        CompanyType::create(['name' => 'Ship Owner / Operator']);
        CompanyType::create(['name' => 'Source / Mine']);
        CompanyType::create(['name' => 'Surveyor']);
        CompanyType::create(['name' => 'Supplier']);
        CompanyType::create(['name' => 'Vendor Pengadaan']);
    }
}
