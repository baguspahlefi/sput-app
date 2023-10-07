<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailLevel1;

class Evidancelvl1 extends Model
{
    use HasFactory;
    protected $table = 'evidance_level1';

    protected $fillable = [
        'id_detaillvl1',
        'nama_gambar',
        'path_gambar',
    ];

    public function detaillevel1()
    {
        return $this->belongsTo(DetailLevel1::class, 'id_detail_level_1','id');
    }
    
}
