<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DaftarHadir2;

class DaftarHadir2 extends Model
{
    use HasFactory;

    protected $table = 'daftar_hadir_2';

    protected $fillable = [
        'id_daftar_hadir',
        'nama',
        'nrp'
    ];

    public function level1()
    {
        return $this->belongsTo(MeetingLevel1::class, 'id_daftar_hadir','id');
    }
}
