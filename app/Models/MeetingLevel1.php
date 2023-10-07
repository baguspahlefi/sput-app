<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DaftarHadir;

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
}
