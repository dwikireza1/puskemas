<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use App\Models\Antrian;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role'  => 'dokter'
        ]);
        Role::create([
            'role'  => 'pasien'
        ]);
        Role::create([
            'role'  => 'admin'
        ]);

        User::create([
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('1234'),
            'role_id'   => 3
        ]);

        User::create([
            'name'      => 'Robert Davis Chaniago',
            'email'     => 'robert@gmail.com',
            'password'  => bcrypt('1234'),
            'role_id'   => 2
        ]);

        User::create([
            'name'      => 'Mujiyono',
            'email'     => 'mujiyono@gmail.com',
            'password'  => bcrypt('1234'),
            'role_id'   => 2
        ]);

        $this->call([
            AdminUserSeeder::class,
        ]);
        
        $this->call([
            JadwalDokterSeeder::class,
        ]);
    }
}
