<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DaftarHadir;

class DaftarHadir extends Model
{
    use HasFactory;

    protected $table = 'daftar_hadir';

    protected $fillable = [
        'id_daftar_hadir',
        'nama',
        'pic'
    ];

    public function level1()
    {
        return $this->belongsTo(MeetingLevel1::class, 'id_daftar_hadir','id');
    }
}
