<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DaftarHadir;
use App\Models\DetailLevel3;

class MeetingLevel3 extends Model
{
    use HasFactory;
    protected $table = 'meeting_level3';

    protected $fillable = [
        'judul',
        'tanggal'
    ];

    public function daftar_hadir()
    {
        return $this->hasMany(DaftarHadir::class, 'id_daftar_hadir','id');
    }

    public function detaillvl3()
    {
        return $this->hasMany(DetailLevel3::class, 'id_meeting_level_3','id');
    }
}
