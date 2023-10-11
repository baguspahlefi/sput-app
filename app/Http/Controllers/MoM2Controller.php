<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeetingLevel2;
use App\Models\DaftarHadir2;
use App\Models\Detaillvl2;

class MoM2Controller extends Controller
{
    public function index()
    {
        // $items = MeetingLevel1::with(['daftar_hadir'])->firstOrFail();
        // $meetingLevel1Id = 3; // Ganti dengan ID yang sesuai
        
        $level2 = MeetingLevel2::all();
        return view('MOM.MoM2.index',
        [   
            'level' => $level2,
        ]);
    }

    // Show modal daftar hadir
    public function modal_store(Request $request){
        $item = new DaftarHadir2();
        $item->id_daftar_hadir = $request->id_daftar_hadir;
        $item->nama = $request->nama;
        $item->nrp = $request->nrp;
        $item->save();
        return redirect()->route('MoM2');
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
        MeetingLevel2::create($item);
        return redirect()->route('MoM2');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = MeetingLevel2::findOrFail($id);
        return view ('MOM.MoM2.detail',
        [
            'show'=>$item,
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
    public function destroy(string $id)
    {
        //
    }
}
