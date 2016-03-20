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

        $jcrilly = $user->create([
            'name'          => 'Jody Crilly',
            'email'         => 'jcrilly@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'BasicUser'
        ]);
        $jcrilly->assignRole('basicuser');

        $dceo = $user->create([
            'name'          => 'Deputy CEO',
            'email'         => 'dceo@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'BPLead'
        ]);
        $dceo->assignRole('bplead');

        $skarr = $user->create([
            'name'          => 'Sharon Karr',
            'email'         => 'skarr@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'BasicUser'
        ]);
        $skarr->assignRole('basicuser');

        $dpsl = $user->create([
            'name'          => 'Digital Public Spaces Librarian',
            'email'         => 'dpsl@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'BasicUser'
        ]);
        $dpsl->assignRole('basicuser');

        $pschoenberg = $user->create([
            'name'          => 'Peter Schoenberg',
            'email'         => 'pschoenberg@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'BasicUser'
        ]);
        $pschoenberg->assignRole('basicuser');

        $jwoods = $user->create([
            'name'          => 'J Woods',
            'email'         => 'jwoods@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'BasicUser'
        ]);
        $jwoods->assignRole('basicuser');

        $sforemski = $user->create([
            'name'          => 'S Foremski',
            'email'         => 'sforemski@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'BasicUser'
        ]);
        $sforemski->assignRole('basicuser');

        $bcrittenden = $user->create([
            'name'          => 'B Crittenden',
            'email'         => 'bcrittenden@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'BasicUser'
        ]);
        $bcrittenden->assignRole('basicuser');

        $estuebing = $user->create([
            'name'          => 'E Stuebing',
            'email'         => 'estuebing@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'BasicUser'
        ]);
        $estuebing->assignRole('basicuser');

        $dmichael = $user->create([
            'name'          => 'Michael Doe',
            'email'         => 'dmichael@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'BasicUser'
        ]);
        $dmichael->assignRole('basicuser');

        $dluc = $user->create([
            'name'          => 'Luc Doe',
            'email'         => 'dluc@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'BasicUser'
        ]);
        $dluc->assignRole('basicuser');

        $djohn = $user->create([
            'name'          => 'John Doe',
            'email'         => 'djohn@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'BasicUser'
        ]);
        $djohn->assignRole('basicuser');

        $nandrew = $user->create([
            'name'          => 'Andrew Nisbet',
            'email'         => 'nandrew@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'BasicUser'
        ]);
        $nandrew->assignRole('basicuser');

        $dchris = $user->create([
            'name'          => 'Chris Doe',
            'email'         => 'dchris@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'BasicUser'
        ]);
        $dchris->assignRole('basicuser');

        $acarruthers = $user->create([
            'name'          => 'Alex Carruthers',
            'email'         => 'acarruthers@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'BasicUser'
        ]);
        $acarruthers->assignRole('basicuser');

        $dkhalil = $user->create([
            'name'          => 'Khalil Doe',
            'email'         => 'dkhalil@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'BasicUser'
        ]);
        $dkhalil->assignRole('basicuser');

        $drobin = $user->create([
            'name'          => 'Robin Doe',
            'email'         => 'drobin@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'BasicUser'
        ]);
        $drobin->assignRole('basicuser');

        $crachael = $user->create([
            'name'          => 'Rachael Collins',
            'email'         => 'crachael@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'BasicUser'
        ]);
        $crachael->assignRole('basicuser');

        $djamie = $user->create([
            'name'          => 'Jamie Doe',
            'email'         => 'djamie@epl.ca',
            'password'      => bcrypt('password'),
            'department'    => 'IT',
            'permission'    => 'BasicUser'
        ]);
        $djamie->assignRole('basicuser');
    }
}
