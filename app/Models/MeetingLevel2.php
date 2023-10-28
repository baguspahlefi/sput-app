<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DaftarHadir;
use App\Models\DetailLevel2;

class MeetingLevel2 extends Model
{
    use HasFactory;
    protected $table = 'meeting_level2';

    protected $fillable = [
        'judul',
        'tanggal'
    ];

    public function daftar_hadir()
    {
        return $this->hasMany(DaftarHadir::class, 'id_daftar_hadir','id');
    }

    public function detaillvl2()
    {
        return $this->hasMany(DetailLevel2::class, 'id_meeting','id');
    }
}
