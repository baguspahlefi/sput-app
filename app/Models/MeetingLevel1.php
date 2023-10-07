<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DaftarHadir;
use App\Models\DetailLevel1;

class MeetingLevel1 extends Model
{
    use HasFactory;
    protected $table = 'meeting_level1';

    protected $fillable = [
        'judul',
        'tanggal'
    ];

    public function daftar_hadir()
    {
        return $this->hasMany(DaftarHadir::class, 'id_daftar_hadir','id');
    }

    public function detaillvl1()
    {
        return $this->hasMany(DetailLevel1::class, 'id_meeting_level_1','id');
    }
}
