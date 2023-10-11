<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MeetingLevel2;
use App\Models\DetailLevel2;

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

    public function evidancelvl2()
    {
        return $this->belongsTo(DetailLevel2::class, 'id_detail_level_2','id');
    }

 
}
