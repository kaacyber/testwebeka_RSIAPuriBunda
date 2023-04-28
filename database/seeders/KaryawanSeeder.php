<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Karyawan;
use App\Models\Unit;
use App\Models\Jabatan;

class KaryawanSeeder extends Seeder
{
    public function run()
    {
        // Generate 10 karyawan dengan unit dan jabatan random
        for ($i = 1; $i <= 10; $i++) {
            $karyawan = Karyawan::create([
                'name' => 'Karyawan ' . $i,
                'username' => 'karyawan' . $i,
                'unit_id' => Unit::inRandomOrder()->first()->id,
                'tanggal_bergabung' => now(),
            ]);
            $jabatan_ids = Jabatan::inRandomOrder()->limit(rand(1, 3))->pluck('id')->toArray();
            $karyawan->jabatan()->attach($jabatan_ids);
        }
    }
}
