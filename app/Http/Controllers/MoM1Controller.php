<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeetingLevel1;
use App\Models\DaftarHadir;
use App\Models\DetailLevel1;
use App\Models\PIC;
use App\Models\Status;

class MoM1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $items = MeetingLevel1::with(['daftar_hadir'])->firstOrFail();
        // $meetingLevel1Id = 3; // Ganti dengan ID yang sesuai
        
        $level1 = MeetingLevel1::all();
        return view('MOM.MoM1.index',
        [   
            'level1' => $level1
        ]);
    }

    // Show modal daftar hadir
    public function modal_store(Request $request){
        $item = new DaftarHadir();
        $item->id_daftar_hadir = $request->id_daftar_hadir;
        $item->nama = $request->nama;
        $item->nrp = $request->nrp;
        $item->save();
        return redirect()->route('MoM1');
    }

    // public function modal_show($id){
    //     $item = MeetingLevel1::findOrFail($id);
    //     return view('MOM.MoM1.index',
    //     [   
    //         'item' => $item,
    //     ]);
    // }

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
        $item = $request->all();
        MeetingLevel1::create($item);
        return redirect()->route('MoM1');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pic = PIC::all();
        $status = Status::all();
        $item = MeetingLevel1::findOrFail($id);
        return view ('MOM.MoM1.detail',
        [
            'item'=>$item,
            'pic' => $pic,
            'status' => $status,
            'details' => DetailLevel1::get()
        ]);
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
    public function destroy($id)
    {

    }
}
