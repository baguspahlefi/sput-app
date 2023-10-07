<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MeetingLevel1;
use App\Models\DetailLevel1;

class DetailLevel1 extends Model
{
    use HasFactory;
    protected $table = 'detail_level1';

    protected $fillable = [
        'id_meeting_level_1',
        'point_of_meeting',
        'pic',
        'nrp',
        'status'
    ];

    public function meeting_level_1()
	{
		return $this->belongsTo(MeetingLevel1::class, 'id_meeting_level_1','id');
	}

    public function evidancelvl1()
    {
        return $this->belongsTo(DetailLevel1::class, 'id_detail_level_1','id');
    }

 
}
