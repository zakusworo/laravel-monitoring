<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemagangan extends Model
{
    use HasFactory;
    protected $table = 'data_bimbingan';
    protected $fillable = [
        'mahasiswa_id',
        'dosenpembimbing_id',
        'pembimbingindustri_id',
        'mulai_magang',
        'selesai_magang',
        'jenis_pekerjaan',
    ];

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'id','mahasiswa_id');
    }

    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'id_data_bimbingan','id');
    }

}
