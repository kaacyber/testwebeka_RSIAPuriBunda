<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = ['name_unit'];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
}
