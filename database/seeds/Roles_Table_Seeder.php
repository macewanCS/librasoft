<?php

use Illuminate\Database\Seeder;
use Kodeine\Acl\Models\Eloquent\Role;

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
        $roleAdmin->assignPermission('goal', 'objective', 'action', 'task', 'user');

        $rolebpLead = $role->create([
            'name'=> 'BPLead',
            'slug'=> 'bpLead',
            'description'=> 'Manage Business Plan privileges'
        ]);
        $rolebpLead->assignPermission('goal');

        $roledepLead = $role->create([
            'name'=> 'DepLead',
            'slug'=> 'depLead',
            'description'=> 'Manage Department Lead privileges'
        ]);
        $roledepLead->assignPermission('objective');

        $roleteamLead = $role->create([
            'name'=> 'TeamLead',
            'slug'=> 'teamLead',
            'description'=> 'Manage Team Lead privileges'
        ]);
        $roleteamLead->assignPermission('action');
    }
}
