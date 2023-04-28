<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $fillable = ['name_jabatan'];

    public function karyawan()
    {
        return $this->belongsToMany(Karyawan::class, 'jabatan_karyawan')->withTimestamps();
    }
}
