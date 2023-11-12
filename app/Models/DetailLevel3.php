<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MeetingLevel3;
use App\Models\DetailLevel3;
use App\Models\EvidanceLevel3;
use Carbon\Carbon;

class DetailLevel3 extends Model
{
    use HasFactory;
    protected $table = 'detail_level3';

    protected $fillable = [
        'id_meeting',
        'point_of_meeting',
        'pic',
        'due',
        'nrp',
        'status'
    ];

    public function meeting_level_3()
	{
		return $this->belongsTo(MeetingLevel3::class, 'id_meeting','id');
	}

    public function evidance_level_3()
    {
        return $this->hasMany(EvidanceLevel3::class, 'id_detaillvl3','id');
    }
    
    public function scopeFilter($query, array $filters){
		// filter tanggal
        if (request()->startDate || request()->endDate){
            $startDate = Carbon::parse(request()->startDate)->toDateTimeString();
            $endDate = Carbon::parse(request()->endDate)->toDateTimeString();
            $query->whereBetween('due',[$startDate,$endDate]);
        }
		
	}

 
}
