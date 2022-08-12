<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $ketua = factory(User::class)->create([
            'nip'      => '199312102018081001',
            'name'     => 'KETUA',
            'email'    => 'ketua@koperasi.com',
            'email_verified_at' => now(),
            'password' => bcrypt('koperasi'),
            'jenis_kelamin' => 'Laki-Laki',
            'jabatan' => 'ketua',
            'alamat' => 'Jakarta',
            'phone'    => '89672650971',  // Gua tambahin
        ]);

        $ketua->assignRole('ketua');

        $this->command->info('>_ Here is your ketua details to login:');
        $this->command->warn($ketua->email);
        $this->command->warn('Password is "koperasi"');

        $bendahara = factory(User::class)->create([
            'nip'      => '199312102018081002',
            'name'     => 'BENDAHARA',
            'email'    => 'bendahara@koperasi.com',
            'email_verified_at' => now(),
            'password' => bcrypt('koperasi'),
            'jenis_kelamin' => 'Perempuan',
            'jabatan' => 'bendahara',
            'alamat' => 'London',
            'phone'    => '89672650972',// Gua tambahin
        ]);

        $bendahara->assignRole('bendahara');

        $this->command->info('>_ Here is your bendahara details to login:');
        $this->command->warn($bendahara->email);
        $this->command->warn('Password is "koperasi"');

        $anggota = factory(User::class)->create([
            'nip'      => '199312102018081004',
            'name'     => 'ANGGOTA',
            'email'    => 'anggota@koperasi.com',
            'email_verified_at' => now(),
            'password' => bcrypt('koperasi'),
            'jenis_kelamin' => 'Perempuan',
            'jabatan' => 'anggota',
            'alamat' => 'New York',
            'phone'    => '89672650973',
        ]);

        $anggota->assignRole('anggota');

        $this->command->info('>_ Here is your anggota details to login:');
        $this->command->warn($anggota->email);
        $this->command->warn('Password is "koperasi"');

        // bersihkan cache
        $this->command->call('cache:clear');
    }
}
