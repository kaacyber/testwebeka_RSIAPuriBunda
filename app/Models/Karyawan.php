<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'username', 'unit_id', 'tanggal_bergabung'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function jabatan()
    {
        return $this->belongsToMany(Jabatan::class, 'jabatan_karyawan')->withTimestamps();
    }
}
