<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create(['name_jabatan' => 'Manager']);
        Jabatan::create(['name_jabatan' => 'Supervisor']);
        Jabatan::create(['name_jabatan' => 'Staff']);
    }
}
