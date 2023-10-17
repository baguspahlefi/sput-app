<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeetingLevel1;
use App\Models\DaftarHadir;
use App\Models\DetailLevel1;
use App\Models\PIC;
use App\Models\Status;
use App\Models\EvidanceLevel1;

use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statusMoM1 = DetailLevel1::select('status', DB::raw('count(id) as count'))
        ->groupBy('status')
        ->get();
        $labelsMoM1 = $statusMoM1->pluck('status');
        $dataMoM1 = $statusMoM1->pluck('count');
        $statusMoM1_2 = DB::table('detail_level1')
        ->select('pic', DB::raw('count(id) as id_count'), 'status')
        ->groupBy('pic', 'status')
        ->get();
        
        
        return view ('dashboard', [
            'statusMoM1' => [
                'labelsMoM1' => $labelsMoM1,
                'dataMoM1' => $dataMoM1,
            ],
            'statusMoM1_2' => $statusMoM1_2,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
