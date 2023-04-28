<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Database\Seeder;


class JabatanKaryawanSeeder extends Seeder
{
    public function run()
    {
        // Assign jabatan secara random pada setiap karyawan
        $karyawans = Karyawan::all();
        foreach ($karyawans as $karyawan) {
            $jabatan_ids = Jabatan::inRandomOrder()->limit(rand(1, 3))->pluck('id')->toArray();
            $karyawan->jabatan()->attach($jabatan_ids);
        }
    }
}
