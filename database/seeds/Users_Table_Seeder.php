<?php

use Illuminate\Database\Seeder;
use App\User;

class Users_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $vicky = $user->create([
            'name'          => 'Vicky',
            'email'         => 'vvarga@epl.ca',
            'password'      => bcrypt('vicky'),
            'department'    => 'IT',
            'permission'    => 'BPLead'
        ]);
        $vicky->assignRole('bplead');

        $admin = $user->create([
            'name'=> 'Admin',
            'email'=> 'admin@epl.ca',
            'password'=> bcrypt('password'),
            'department' => 'Admin',
            'permission' => 'Admin'
        ]);
        $admin->assignRole('admin');

        $jmcphee = $user->create([
            'name'          => 'J McPhee',
            'email'         => 'jmcphee@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'DepLead'
        ]);
        $jmcphee->assignRole('deplead');

        $lmackenzie = $user->create([
            'name'          => 'L MacKenzie',
            'email'         => 'lmackenzie@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'TeamLead'
        ]);
        $lmackenzie->assignRole('teamlead');

        $ejones = $user->create([
            'name'          => 'E Jones',
            'email'         => 'ejones@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'BasicUser'
        ]);
        $ejones->assignRole('basicuser');
    }
}
