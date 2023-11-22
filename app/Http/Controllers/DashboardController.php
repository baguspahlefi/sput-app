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

        $dataEPR1 = DB::table('detail_level1')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'Eng, Port & Road')
        ->groupBy('status')
        ->get();

        $statusCountsEPR1 = [];
        foreach ($dataEPR1 as $row) {
            $statusCountsEPR1[$row->status] = $row->count;
        }

        $dataPS1 = DB::table('detail_level1')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'Plant & SM')
        ->groupBy('status')
        ->get();

        $statusCountsPS1 = [];
        foreach ($dataPS1 as $row) {
            $statusCountsPS1[$row->status] = $row->count;
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

        $dataMD1 = DB::table('detail_level1')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'MD')
        ->groupBy('status')
        ->get();

        $statusCountsMD1 = [];
        foreach ($dataMD1 as $row) {
            $statusCountsMD1[$row->status] = $row->count;
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

        $dataEPR2 = DB::table('detail_level2')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'Eng, Port & Road')
        ->groupBy('status')
        ->get();

        $statusCountsEPR2 = [];
        foreach ($dataEPR2 as $row) {
            $statusCountsEPR2[$row->status] = $row->count;
        }

        $dataPS2 = DB::table('detail_level2')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'Plant & SM')
        ->groupBy('status')
        ->get();

        $statusCountsPS2 = [];
        foreach ($dataPS2 as $row) {
            $statusCountsPS2[$row->status] = $row->count;
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

        $dataMD2 = DB::table('detail_level2')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'MD')
        ->groupBy('status')
        ->get();

        $statusCountsMD2 = [];
        foreach ($dataMD2 as $row) {
            $statusCountsMD2[$row->status] = $row->count;
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

        $dataEPR3 = DB::table('detail_level3')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'Eng, Port & Road')
        ->groupBy('status')
        ->get();

        $statusCountsEPR3 = [];
        foreach ($dataEPR3 as $row) {
            $statusCountsEPR3[$row->status] = $row->count;
        }

        $dataPS3 = DB::table('detail_level3')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'Plant & SM')
        ->groupBy('status')
        ->get();

        $statusCountsPS3 = [];
        foreach ($dataPS3 as $row) {
            $statusCountsPS3[$row->status] = $row->count;
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

        $dataMD3 = DB::table('detail_level3')
        ->select('status', DB::raw('count(*) as count'))
        ->where('pic', 'MD')
        ->groupBy('status')
        ->get();

        $statusCountsMD3 = [];
        foreach ($dataMD3 as $row) {
            $statusCountsMD3[$row->status] = $row->count;
        }

        return view('dashboard', [
            'statusCountsHCGS1' => $statusCountsHCGS1,
            'statusCountsFAT1' => $statusCountsFAT1,
            'statusCountsEPR1' => $statusCountsEPR1,
            'statusCountsPS1' => $statusCountsPS1,
            'statusCountsSHE1' => $statusCountsSHE1,
            'statusCountsProjectManagement1' => $statusCountsProjectManagement1,
            'statusCountsMD1' => $statusCountsMD1,
            'statusCountsHCGS2' => $statusCountsHCGS2,
            'statusCountsFAT2' => $statusCountsFAT2,
            'statusCountsEPR2' => $statusCountsEPR2,
            'statusCountsPS2' => $statusCountsPS2,
            'statusCountsSHE2' => $statusCountsSHE2,
            'statusCountsProjectManagement2' => $statusCountsProjectManagement2,
            'statusCountsMD2' => $statusCountsMD2,
            'statusCountsHCGS3' => $statusCountsHCGS3,
            'statusCountsFAT3' => $statusCountsFAT3,
            'statusCountsEPR3' => $statusCountsEPR3,
            'statusCountsPS3' => $statusCountsPS3,
            'statusCountsSHE3' => $statusCountsSHE3,
            'statusCountsProjectManagement3' => $statusCountsProjectManagement3,
            'statusCountsMD3' => $statusCountsMD3,
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
