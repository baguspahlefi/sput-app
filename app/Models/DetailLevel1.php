<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MeetingLevel1;
use App\Models\DetailLevel1;
use App\Models\EvidanceLevel1;

class DetailLevel1 extends Model
{
    use HasFactory;
    protected $table = 'detail_level1';

    protected $fillable = [
        'id_meeting_level_1',
        'point_of_meeting',
        'pic',
        'due',
        'nrp',
        'status'
    ];

    public function meeting_level_1()
	{
		return $this->belongsTo(MeetingLevel1::class, 'id_meeting_level_1','id');
	}

    public function evidance_level_1()
    {
        return $this->hasMany(EvidanceLevel1::class, 'id_detaillvl1','id');
    }

 
}
