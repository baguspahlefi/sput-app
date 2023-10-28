<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailLevel1;
use App\Models\DetailLevel2;
use App\Models\DetailLevel3;

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

        $statusMoM2 = DetailLevel2::select('status', DB::raw('count(id) as count'))
        ->groupBy('status')
        ->get();
        $labelsMoM2 = $statusMoM2->pluck('status');
        $dataMoM2 = $statusMoM2->pluck('count');


        $statusMoM3 = DetailLevel3::select('status', DB::raw('count(id) as count'))
        ->groupBy('status')
        ->get();
        $labelsMoM3 = $statusMoM3->pluck('status');
        $dataMoM3 = $statusMoM3->pluck('count');


        $dataHCGS1 = DB::table('detail_level1')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'HCGS')
        ->groupBy('status')
        ->get();

        $statusCountsHCGS1 = [];
        foreach ($dataHCGS1 as $row) {
            $statusCountsHCGS1[$row->status] = $row->count;
        }

        $dataFAT1 = DB::table('detail_level1')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'FAT')
        ->groupBy('status')
        ->get();

        $statusCountsFAT1 = [];
        foreach ($dataFAT1 as $row) {
            $statusCountsFAT1[$row->status] = $row->count;
        }

        $dataEngineeringRoad1 = DB::table('detail_level1')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'Engineering Road')
        ->groupBy('status')
        ->get();

        $statusCountsEngineeringRoad1 = [];
        foreach ($dataEngineeringRoad1 as $row) {
            $statusCountsEngineeringRoad1[$row->status] = $row->count;
        }

        $dataPortOperation1 = DB::table('detail_level1')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'Port Operation')
        ->groupBy('status')
        ->get();

        $statusCountsPortOperation1 = [];
        foreach ($dataPortOperation1 as $row) {
            $statusCountsPortOperation1[$row->status] = $row->count;
        }

        $dataSM1 = DB::table('detail_level1')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'SM')
        ->groupBy('status')
        ->get();

        $statusCountsSM1 = [];
        foreach ($dataSM1 as $row) {
            $statusCountsSM1[$row->status] = $row->count;
        }

        $dataPLANT1 = DB::table('detail_level1')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'PLANT')
        ->groupBy('status')
        ->get();

        $statusCountsPLANT1 = [];
        foreach ($dataPLANT1 as $row) {
            $statusCountsPLANT1[$row->status] = $row->count;
        }

        $dataSHE1 = DB::table('detail_level1')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'SHE')
        ->groupBy('status')
        ->get();

        $statusCountsSHE1 = [];
        foreach ($dataSHE1 as $row) {
            $statusCountsSHE1[$row->status] = $row->count;
        }

        $dataProjectManagement1 = DB::table('detail_level1')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'Project Management')
        ->groupBy('status')
        ->get();

        $statusCountsProjectManagement1 = [];
        foreach ($dataProjectManagement1 as $row) {
            $statusCountsProjectManagement1[$row->status] = $row->count;
        }

        $dataHCGS2 = DB::table('detail_level2')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'HCGS')
        ->groupBy('status')
        ->get();

        $statusCountsHCGS2 = [];
        foreach ($dataHCGS2 as $row) {
            $statusCountsHCGS2[$row->status] = $row->count;
        }

        $dataFAT2 = DB::table('detail_level2')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'FAT')
        ->groupBy('status')
        ->get();

        $statusCountsFAT2 = [];
        foreach ($dataFAT2 as $row) {
            $statusCountsFAT2[$row->status] = $row->count;
        }

        $dataEngineeringRoad2 = DB::table('detail_level2')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'Engineering Road')
        ->groupBy('status')
        ->get();

        $statusCountsEngineeringRoad2 = [];
        foreach ($dataEngineeringRoad2 as $row) {
            $statusCountsEngineeringRoad2[$row->status] = $row->count;
        }

        $dataPortOperation2 = DB::table('detail_level2')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'Port Operation')
        ->groupBy('status')
        ->get();

        $statusCountsPortOperation2 = [];
        foreach ($dataPortOperation2 as $row) {
            $statusCountsPortOperation2[$row->status] = $row->count;
        }

        $dataSM2 = DB::table('detail_level2')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'SM')
        ->groupBy('status')
        ->get();

        $statusCountsSM2 = [];
        foreach ($dataSM2 as $row) {
            $statusCountsSM2[$row->status] = $row->count;
        }

        $dataPLANT2 = DB::table('detail_level2')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'PLANT')
        ->groupBy('status')
        ->get();

        $statusCountsPLANT2 = [];
        foreach ($dataPLANT2 as $row) {
            $statusCountsPLANT2[$row->status] = $row->count;
        }

        $dataSHE2 = DB::table('detail_level2')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'SHE')
        ->groupBy('status')
        ->get();

        $statusCountsSHE2 = [];
        foreach ($dataSHE2 as $row) {
            $statusCountsSHE2[$row->status] = $row->count;
        }

        $dataProjectManagement2 = DB::table('detail_level2')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'Project Management')
        ->groupBy('status')
        ->get();

        $statusCountsProjectManagement2 = [];
        foreach ($dataProjectManagement2 as $row) {
            $statusCountsProjectManagement2[$row->status] = $row->count;
        }

        $dataHCGS3 = DB::table('detail_level3')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'HCGS')
        ->groupBy('status')
        ->get();

        $statusCountsHCGS3 = [];
        foreach ($dataHCGS3 as $row) {
            $statusCountsHCGS3[$row->status] = $row->count;
        }

        $dataFAT3 = DB::table('detail_level3')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'FAT')
        ->groupBy('status')
        ->get();

        $statusCountsFAT3 = [];
        foreach ($dataFAT3 as $row) {
            $statusCountsFAT3[$row->status] = $row->count;
        }

        $dataEngineeringRoad3 = DB::table('detail_level3')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'Engineering Road')
        ->groupBy('status')
        ->get();

        $statusCountsEngineeringRoad3 = [];
        foreach ($dataEngineeringRoad3 as $row) {
            $statusCountsEngineeringRoad3[$row->status] = $row->count;
        }

        $dataPortOperation3 = DB::table('detail_level3')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'Port Operation')
        ->groupBy('status')
        ->get();

        $statusCountsPortOperation3 = [];
        foreach ($dataPortOperation3 as $row) {
            $statusCountsPortOperation3[$row->status] = $row->count;
        }

        $dataSM3 = DB::table('detail_level3')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'SM')
        ->groupBy('status')
        ->get();

        $statusCountsSM3 = [];
        foreach ($dataSM3 as $row) {
            $statusCountsSM3[$row->status] = $row->count;
        }

        $dataPLANT3 = DB::table('detail_level3')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'PLANT')
        ->groupBy('status')
        ->get();

        $statusCountsPLANT3 = [];
        foreach ($dataPLANT3 as $row) {
            $statusCountsPLANT3[$row->status] = $row->count;
        }

        $dataSHE3 = DB::table('detail_level3')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'SHE')
        ->groupBy('status')
        ->get();

        $statusCountsSHE3 = [];
        foreach ($dataSHE3 as $row) {
            $statusCountsSHE3[$row->status] = $row->count;
        }

        $dataProjectManagement3 = DB::table('detail_level3')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'Project Management')
        ->groupBy('status')
        ->get();

        $statusCountsProjectManagement3 = [];
        foreach ($dataProjectManagement3 as $row) {
            $statusCountsProjectManagement3[$row->status] = $row->count;
        }

        return view('dashboard', [
            'statusCountsHCGS1' => $statusCountsHCGS1,
            'statusCountsFAT1' => $statusCountsFAT1,
            'statusCountsEngineeringRoad1' => $statusCountsEngineeringRoad1,
            'statusCountsPortOperation1' => $statusCountsPortOperation1,
            'statusCountsSM1' => $statusCountsSM1,
            'statusCountsPLANT1' => $statusCountsPLANT1,
            'statusCountsSHE1' => $statusCountsSHE1,
            'statusCountsProjectManagement1' => $statusCountsProjectManagement1,
            'statusCountsHCGS2' => $statusCountsHCGS2,
            'statusCountsFAT2' => $statusCountsFAT2,
            'statusCountsEngineeringRoad2' => $statusCountsEngineeringRoad2,
            'statusCountsPortOperation2' => $statusCountsPortOperation2,
            'statusCountsSM2' => $statusCountsSM2,
            'statusCountsPLANT2' => $statusCountsPLANT2,
            'statusCountsSHE2' => $statusCountsSHE2,
            'statusCountsProjectManagement2' => $statusCountsProjectManagement2,
            'statusCountsHCGS3' => $statusCountsHCGS3,
            'statusCountsFAT3' => $statusCountsFAT3,
            'statusCountsEngineeringRoad3' => $statusCountsEngineeringRoad3,
            'statusCountsPortOperation3' => $statusCountsPortOperation3,
            'statusCountsSM3' => $statusCountsSM3,
            'statusCountsPLANT3' => $statusCountsPLANT3,
            'statusCountsSHE3' => $statusCountsSHE3,
            'statusCountsProjectManagement3' => $statusCountsProjectManagement3,
            'statusMoM1' => [
                'labelsMoM1' => $labelsMoM1,
                'dataMoM1' => $dataMoM1,
            ],
            'statusMoM2' => [
                 'labelsMoM2' => $labelsMoM2,
                 'dataMoM2' => $dataMoM2,
            ],
            'statusMoM3' => [
                'labelsMoM3' => $labelsMoM3,
                'dataMoM3' => $dataMoM3,
           ],
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
