<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailLevel3;

class EvidanceLevel3 extends Model
{
    use HasFactory;
    protected $table = 'evidance_level3';

    protected $fillable = [
        'id_detaillvl3',
        'nama_gambar',
        'path_gambar',
    ];

    public function detaillevel3()
    {
        return $this->belongsTo(DetailLevel3::class, 'id_detaillvl3','id');
    }
    
}
