<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailLevel2;

class EvidanceLevel2 extends Model
{
    use HasFactory;
    protected $table = 'evidance_level2';

    protected $fillable = [
        'id_detaillvl2',
        'nama_gambar',
        'path_gambar',
    ];

    public function detaillevel2()
    {
        return $this->belongsTo(DetailLevel2::class, 'id_detaillvl2','id');
    }
    
}
