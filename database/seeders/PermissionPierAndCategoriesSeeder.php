<?php

namespace Database\Seeders;

use App\Models\PermissionGroup;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionPierAndCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pierCategories = PermissionGroup::create(['name' => 'Pier Categories']);
        Permission::create(['name' => 'pier-categories-read-all', 'label' => 'Read all pier categories', 'permission_group_id' => $pierCategories->id]);
        Permission::create(['name' => 'pier-categories-create', 'label' => 'Create pier categories', 'permission_group_id' => $pierCategories->id]);
        Permission::create(['name' => 'pier-categories-update', 'label' => 'Update pier categories', 'permission_group_id' => $pierCategories->id]);

        $piers = PermissionGroup::create(['name' => 'Piers']);
        Permission::create(['name' => 'pier-read-all', 'label' => 'Read all piers', 'permission_group_id' => $piers->id]);
        Permission::create(['name' => 'pier-create', 'label' => 'Create piers', 'permission_group_id' => $piers->id]);
        Permission::create(['name' => 'pier-update', 'label' => 'Update piers', 'permission_group_id' => $piers->id]);
    }
}
