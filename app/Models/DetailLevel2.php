<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MeetingLevel2;
use App\Models\DetailLevel2;
use App\Models\EvidanceLevel2;

class DetailLevel2 extends Model
{
    use HasFactory;
    protected $table = 'detail_level2';

    protected $fillable = [
        'id_meeting_level_2',
        'point_of_meeting',
        'pic',
        'nrp',
        'status'
    ];

    public function meeting_level_2()
	{
		return $this->belongsTo(MeetingLevel2::class, 'id_meeting_level_2','id');
	}

    public function evidance_level_2()
    {
        return $this->hasMany(EvidanceLevel2::class, 'id_detaillvl2','id');
    }

 
}
