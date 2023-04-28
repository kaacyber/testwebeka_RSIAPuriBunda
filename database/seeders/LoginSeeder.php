<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Karyawan;
use App\Models\Jabatan;

class LoginSeeder extends Seeder
{
    public function run()
    {
        // Membuat 200 data login dengan user secara random
        User::factory(200)->create()->each(function ($u) {
            // Menambahkan jabatan untuk setiap user secara random
            $karyawan = Karyawan::all()->random();
            $jabatan = $karyawan->jabatan()->get()->random();
            $u->karyawan()->attach($karyawan->id, ['jabatan_id' => $jabatan->id]);
        });
    }
}
