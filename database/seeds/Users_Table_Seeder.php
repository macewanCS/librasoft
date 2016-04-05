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
            'name'          => 'Vicky Varga',
            'email'         => 'vvarga@epl.ca',
            'password'      => bcrypt('vicky'),
            'department'    => 'IT Services',
            'team'          => '',
            'permission'    => 'BPLead'
        ]);
        $vicky->assignRole('admin');

        $admin = $user->create([
            'name'=> 'Admin',
            'email'=> 'admin@epl.ca',
            'password'=> bcrypt('password'),
            'department' => 'Admin',
            'team'       => 'School Aged Services Team',
            'permission' => 'Admin'
        ]);
        $admin->assignRole('admin');

        $jmcphee = $user->create([
            'name'          => 'J McPhee',
            'email'         => 'jmcphee@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => 'Events Team',
            'permission'    => 'DepLead'
        ]);
        $jmcphee->assignRole('admin');

        $lmackenzie = $user->create([
            'name'          => 'L MacKenzie',
            'email'         => 'lmackenzie@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => 'Discovery Team',
            'permission'    => 'TeamLead'
        ]);
        $lmackenzie->assignRole('admin');

        $ejones = $user->create([
            'name'          => 'E Jones',
            'email'         => 'ejones@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => 'Discovery Team',
            'permission'    => 'BasicUser'
        ]);
        $ejones->assignRole('admin');

        $jcrilly = $user->create([
            'name'          => 'Jody Crilly',
            'email'         => 'jcrilly@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => 'Events Team',
            'permission'    => 'BasicUser'
        ]);
        $jcrilly->assignRole('admin');

        $dceo = $user->create([
            'name'          => 'Deputy CEO',
            'email'         => 'dceo@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => 'Events Team',
            'permission'    => 'BPLead'
        ]);
        $dceo->assignRole('admin');

        $skarr = $user->create([
            'name'          => 'Sharon Karr',
            'email'         => 'skarr@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => 'Community-Led Team',
            'permission'    => 'BasicUser'
        ]);
        $skarr->assignRole('admin');

        $dpsl = $user->create([
            'name'          => 'Digital Public Spaces Librarian',
            'email'         => 'dpsl@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => 'Membership Services Team',
            'permission'    => 'BasicUser'
        ]);
        $dpsl->assignRole('admin');

        $pschoenberg = $user->create([
            'name'          => 'Peter Schoenberg',
            'email'         => 'pschoenberg@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => 'Community-Led Team',
            'permission'    => 'BasicUser'
        ]);
        $pschoenberg->assignRole('admin');

        $jwoods = $user->create([
            'name'          => 'J Woods',
            'email'         => 'jwoods@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => '',
            'permission'    => 'BasicUser'
        ]);
        $jwoods->assignRole('admin');

        $sforemski = $user->create([
            'name'          => 'S Foremski',
            'email'         => 'sforemski@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => 'School Aged Services Team',
            'permission'    => 'BasicUser'
        ]);
        $sforemski->assignRole('admin');

        $bcrittenden = $user->create([
            'name'          => 'B Crittenden',
            'email'         => 'bcrittenden@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => 'School Aged Services Team',
            'permission'    => 'BasicUser'
        ]);
        $bcrittenden->assignRole('admin');

        $estuebing = $user->create([
            'name'          => 'E Stuebing',
            'email'         => 'estuebing@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => 'Membership Services Team',
            'permission'    => 'BasicUser'
        ]);
        $estuebing->assignRole('admin');

        $dmichael = $user->create([
            'name'          => 'Michael Doe',
            'email'         => 'dmichael@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => 'Discovery Team',
            'permission'    => 'BasicUser'
        ]);
        $dmichael->assignRole('admin');

        $dluc = $user->create([
            'name'          => 'Luc Doe',
            'email'         => 'dluc@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => 'Discovery Team',
            'permission'    => 'BasicUser'
        ]);
        $dluc->assignRole('admin');

        $djohn = $user->create([
            'name'          => 'John Doe',
            'email'         => 'djohn@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => 'Membership Services Team',
            'permission'    => 'BasicUser'
        ]);
        $djohn->assignRole('admin');

        $nandrew = $user->create([
            'name'          => 'Andrew Nisbet',
            'email'         => 'nandrew@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => 'Membership Services Team',
            'permission'    => 'BasicUser'
        ]);
        $nandrew->assignRole('admin');

        $dchris = $user->create([
            'name'          => 'Chris Doe',
            'email'         => 'dchris@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => 'Events Team',
            'permission'    => 'BasicUser'
        ]);
        $dchris->assignRole('admin');

        $acarruthers = $user->create([
            'name'          => 'Alex Carruthers',
            'email'         => 'acarruthers@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => 'Events Team',
            'permission'    => 'BasicUser'
        ]);
        $acarruthers->assignRole('admin');

        $dkhalil = $user->create([
            'name'          => 'Khalil Doe',
            'email'         => 'dkhalil@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => 'Discovery Team',
            'permission'    => 'BasicUser'
        ]);
        $dkhalil->assignRole('admin');

        $drobin = $user->create([
            'name'          => 'Robin Doe',
            'email'         => 'drobin@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => 'Discovery Team',
            'permission'    => 'BasicUser'
        ]);
        $drobin->assignRole('admin');

        $crachael = $user->create([
            'name'          => 'Rachael Collins',
            'email'         => 'crachael@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => 'Foundational Programming Team',
            'permission'    => 'BasicUser'
        ]);
        $crachael->assignRole('admin');

        $djamie = $user->create([
            'name'          => 'Jamie Doe',
            'email'         => 'djamie@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT Services',
            'team'          => 'Foundational Programming Team',
            'permission'    => 'BasicUser'
        ]);
        $djamie->assignRole('admin');
    }
}
