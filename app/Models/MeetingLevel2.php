<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DaftarHadir2;
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
        return $this->hasMany(DaftarHadir2::class, 'id_daftar_hadir','id');
    }

    public function detaillvl2()
    {
        return $this->hasMany(DetailLevel2::class, 'id_meeting_level_2','id');
    }
}
