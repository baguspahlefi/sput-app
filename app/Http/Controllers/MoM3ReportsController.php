<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\DetailLevel3;
use PDF;
use App\Exports\ReportDetailLevel3Export;
use Maatwebsite\Excel\Facades\Excel;
class MoM3ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = DetailLevel3::query();
        // Filter status close regardless of date filtering
        $query->where('status', 'close');
    
        $data = $query->get();
        $tanggalAwal = null;
        $tanggalAkhir = null;
    
        return view('report.reportMoM3.index', [
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir,
            'data' => $data,
        ]);
    }

    public function filter(Request $request)
    {
        $startDate = $request->has('startDate') ? Carbon::createFromFormat('Y-m-d', $request->input('startDate'))->startOfDay() : null;
        $endDate = $request->has('endDate') ? Carbon::createFromFormat('Y-m-d', $request->input('endDate'))->endOfDay() : null;
        $request->session()->put('startDate',$startDate);
        $request->session()->put('endDate',$endDate);

        if($request->session()->has('startDate')){
			$tanggal = $request->session()->get('startDate');
            $tanggalAwal = Carbon::parse($tanggal)->format('Y-m-d');
		}else{
			$tanggalAwal = null;
		}

        if($request->session()->has('endDate')){
			$tanggal = $request->session()->get('endDate');
            $tanggalAkhir = Carbon::parse($tanggal)->format('Y-m-d');
		}else{
			$tanggalAkhir = null;
		}
    
        $query = DetailLevel3::query();
    
        if ($startDate && $endDate) {
            $query->whereBetween('due', [$startDate, $endDate]);
        }
    
        // Filter status close regardless of date filtering
        $query->where('status', 'close');
    
        $data = $query->get();
    
        return view('report.reportMoM3.index', [
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir,
            'data' => $data,
        ]);
    }
    

    public function reportPDF(Request $request)
    {
        $tanggalAwal = $request->input('startDate');
        $tanggalAkhir = $request->input('endDate');
        $startDate = $request->has('startDate') ? Carbon::parse($tanggalAwal)->format('Y-m-d') : null;
        $endDate = $request->has('endDate') ? Carbon::parse($tanggalAkhir)->format('Y-m-d') : null;

        $query = DetailLevel3::query();

        if (!$tanggalAwal && !$tanggalAkhir) {
            // Filter status close without date filtering
            $query->where('status', 'close');
        } else {
            // If startDate and/or endDate are provided, apply date filtering
            if ($tanggalAwal && $tanggalAkhir) {
                $query->whereBetween('due', [$startDate, $endDate]);
            }
    
            // Always filter status close regardless of date filtering
            $query->where('status', 'close');
        }

        // Filter status close regardless of date filtering
        $query->where('status', 'close');

        $data = $query->get();

        $pdf = PDF::loadview('report.reportMoM3.report_level_3_pdf', [
            'data' => $data,
        ]);

        return $pdf->stream('report-level-3-pdf');
    }

    public function reportExcel(Request $request)
    {
        $startDate = $request->has('startDate') ? Carbon::createFromFormat('Y-m-d', $request->input('startDate'))->startOfDay() : null;
        $endDate = $request->has('endDate') ? Carbon::createFromFormat('Y-m-d', $request->input('endDate'))->endOfDay() : null;
        return Excel::download(new ReportDetailLevel3Export($startDate,$endDate), 'Report-MoM-Level-3.xlsx');
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
