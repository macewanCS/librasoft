<?php

use Illuminate\Database\Seeder;
use Kodeine\Acl\Models\Eloquent\Role;
use Kodeine\Acl\Models\Eloquent\Permission;

class Roles_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();

        $roleAdmin = $role->create([
            'name'=> 'Admin',
            'slug'=> 'admin',
            'description'=> 'Manage Administration privileges'
        ]);
        $roleAdmin->assignPermission(Permission::all());

        $rolebpLead = $role->create([
            'name'=> 'BPLead',
            'slug'=> 'bplead',
            'description'=> 'Manage Business Plan privileges'
        ]);
        $rolebpLead->assignPermission('mywork');

        $roledepLead = $role->create([
            'name'=> 'DepLead',
            'slug'=> 'deplead',
            'description'=> 'Manage Department Lead privileges'
        ]);
        $roledepLead->assignPermission('objective');

        $roleteamLead = $role->create([
            'name'=> 'TeamLead',
            'slug'=> 'teamlead',
            'description'=> 'Manage Team Lead privileges'
        ]);
        $roleteamLead->assignPermission('action');

        $rolebasicUser = $role->create([
            'name'=> 'BasicUser',
            'slug'=> 'basicuser',
            'description'=> 'Manage Basic User privileges'
        ]);
    }
}
