<?php

namespace Database\Seeders;

use App\Models\PermissionGroup;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionAndGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mainAccess = PermissionGroup::create(['name' => 'Main access']);
        Permission::create(['name' => 'login', 'label' => 'Login', 'permission_group_id' => $mainAccess->id]);

        $appUsers = PermissionGroup::create(['name' => 'Users']);
        Permission::create(['name' => 'users-read-all', 'label' => 'Read all user', 'permission_group_id' => $appUsers->id]);
        Permission::create(['name' => 'users-create', 'label' => 'Create user', 'permission_group_id' => $appUsers->id]);
        Permission::create(['name' => 'users-update', 'label' => 'Update user', 'permission_group_id' => $appUsers->id]);
        Permission::create(['name' => 'users-change-permissions', 'label' => 'Change Permissions', 'permission_group_id' => $appUsers->id]);

        $roles = PermissionGroup::create(['name' => 'Roles']);
        Permission::create(['name' => 'roles-read-all', 'label' => 'Read all role', 'permission_group_id' => $roles->id]);
        Permission::create(['name' => 'roles-create', 'label' => 'Create role', 'permission_group_id' => $roles->id]);
        Permission::create(['name' => 'roles-update', 'label' => 'Update role', 'permission_group_id' => $roles->id]);

        $accessRequest = PermissionGroup::create(['name' => 'Manage Access Request']);
        Permission::create(['name' => 'access-requests-read-all', 'label' => 'Read all access request', 'permission_group_id' => $accessRequest->id]);
        Permission::create(['name' => 'access-requests-approve', 'label' => 'Approve access request', 'permission_group_id' => $accessRequest->id]);
        Permission::create(['name' => 'access-requests-reject', 'label' => 'Reject access request', 'permission_group_id' => $accessRequest->id]);

        $ships = PermissionGroup::create(['name' => 'Ships']);
        Permission::create(['name' => 'ships-read-all', 'label' => 'Read all ship', 'permission_group_id' => $ships->id]);
        Permission::create(['name' => 'ships-create', 'label' => 'Create ship', 'permission_group_id' => $ships->id]);
        Permission::create(['name' => 'ships-update', 'label' => 'Update ship', 'permission_group_id' => $ships->id]);

        $boats = PermissionGroup::create(['name' => 'Boats']);
        Permission::create(['name' => 'boats-read-all', 'label' => 'Read all boat', 'permission_group_id' => $boats->id]);
        Permission::create(['name' => 'boats-create', 'label' => 'Create boat', 'permission_group_id' => $boats->id]);
        Permission::create(['name' => 'boats-update', 'label' => 'Update boat', 'permission_group_id' => $boats->id]);

        $company = PermissionGroup::create(['name' => 'Companies']);
        Permission::create(['name' => 'companies-read-all', 'label' => 'Read all companies', 'permission_group_id' => $company->id]);
        Permission::create(['name' => 'companies-create', 'label' => 'Create company', 'permission_group_id' => $company->id]);
        Permission::create(['name' => 'companies-update', 'label' => 'Update company', 'permission_group_id' => $company->id]);
    }
}
