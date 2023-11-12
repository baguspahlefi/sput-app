<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\DetailLevel1;
use PDF;
use App\Exports\ReportDetailLevel1Export;
use Maatwebsite\Excel\Facades\Excel;

class MoM1ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = DetailLevel1::query();
        // Filter status close regardless of date filtering
        $query->where('status', 'close');
    
        $data = $query->get();
        $tanggalAwal = null;
        $tanggalAkhir = null;
    
        return view('report.reportMoM1.index', [
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
    
        $query = DetailLevel1::query();
    
        if ($startDate && $endDate) {
            $query->whereBetween('due', [$startDate, $endDate]);
        }
    
        // Filter status close regardless of date filtering
        $query->where('status', 'close');
    
        $data = $query->get();
    
        return view('report.reportMoM1.index', [
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir,
            'data' => $data,
        ]);
    }
    

    public function reportPDF(Request $request)
    {
        $startDate = $request->has('startDate') ? Carbon::createFromFormat('Y-m-d', $request->input('startDate'))->startOfDay() : null;
        $endDate = $request->has('endDate') ? Carbon::createFromFormat('Y-m-d', $request->input('endDate'))->endOfDay() : null;

        $query = DetailLevel1::query();

        if ($startDate && $endDate) {
            $query->whereBetween('due', [$startDate, $endDate]);
        }

        // Filter status close regardless of date filtering
        $query->where('status', 'close');

        $data = $query->get();

        $pdf = PDF::loadview('report.reportMoM1.report_level_1_pdf', [
            'data' => $data,
        ]);

        return $pdf->stream('report-level-1-pdf');
    }

    public function reportExcel(Request $request)
    {
        $startDate = $request->has('startDate') ? Carbon::createFromFormat('Y-m-d', $request->input('startDate'))->startOfDay() : null;
        $endDate = $request->has('endDate') ? Carbon::createFromFormat('Y-m-d', $request->input('endDate'))->endOfDay() : null;
        return Excel::download(new ReportDetailLevel1Export($startDate,$endDate), 'Report-MoM-Level-1.xlsx');
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
