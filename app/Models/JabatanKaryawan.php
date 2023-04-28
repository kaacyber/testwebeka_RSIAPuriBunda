<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanKaryawan extends Model
{
    use HasFactory;

    protected $table = 'jabatan_karyawan';

    protected $fillable = ['jabatan_id', 'karyawan_id'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
