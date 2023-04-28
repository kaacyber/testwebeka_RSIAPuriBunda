<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::create(['name_unit' => 'IT']);
        Unit::create(['name_unit' => 'HRD']);
        Unit::create(['name_unit' => 'Marketing']);
    }
}
