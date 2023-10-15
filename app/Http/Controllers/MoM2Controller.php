<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeetingLevel2;
use App\Models\DaftarHadir;
use App\Models\DetailLevel2;
use App\Models\PIC;
use App\Models\Status;
use App\Models\EvidanceLevel2;

class MoM2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $items = MeetingLevel1::with(['daftar_hadir'])->firstOrFail();
        // $meetingLevel1Id = 3; // Ganti dengan ID yang sesuai
        
        $level2 = MeetingLevel2::all();
        return view('MOM.MoM2.index',
        [   
            'level2' => $level2
        ]);
    }

    // Show modal daftar hadir
    public function modal_store(Request $request){
        $item = new DaftarHadir();
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
        $data = MeetingLevel2::findOrFail($id);
        $item = $request->all();

        $data->update($item);
        return redirect()->route('MoM2')->with('success','Update Berhasil');
    }

    public function update_daftarHadir(Request $request)
    {
            $daftar_hadir_ids = $request->input('daftar_hadir_id');

            // $daftar_hadir_ids sekarang berisi array dari ID yang dikirim dari formulir

            // Anda dapat melakukan operasi update sesuai kebutuhan, misalnya:
            foreach ($daftar_hadir_ids as $id) {
                $daftarHadir = DaftarHadir::find($id);
        
                if ($daftarHadir) {
                    $nama = $request->input('nama_' . $id); // Mengakses input berdasarkan ID
                    $nrp = $request->input('nrp_' . $id);
        
                    // Lakukan operasi pada setiap $daftarHadir, contohnya:
                    $daftarHadir->nama = $nama;
                    $daftarHadir->nrp = $nrp;
                    $daftarHadir->save();
                }
            }

        // Setelah update selesai, Anda dapat melakukan redirect atau mereturn responsenya.
        return redirect()->route('MoM2')->with('success','Update Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = MeetingLevel2::findOrFail($id);
        $item->delete();
        sleep(1);
        return redirect()->back()->with('success', 'Berhasil hapus meeting');
    }
}
