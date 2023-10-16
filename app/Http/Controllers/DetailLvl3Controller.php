<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailLevel3;
use App\Models\MeetingLevel3;
use App\Models\EvidanceLevel3;
use App\Models\PIC;
use App\Models\Status;
use DB;

class DetailLvl3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $pic = PIC::all();
        $status = Status::all();
        $item = MeetingLevel3::findOrFail($id);
        return view ('MOM.MoM3.detail',
        [
            'item'=>$item,
            'pic' => $pic,
            'status' => $status,
            'details' => DetailLevel3::get()
        ]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item = new DetailLevel3();
        $item->id_meeting_level_3 = $request->id;
        $item->point_of_meeting = $request->point_of_meeting;
        $item->pic = $request->pic;
        $item->due = $request->due;
        $item->status = $request->status;
        $item->save();
        return redirect(route('detail3.index', $item->id_meeting_level_3));
    }

    public function store_evidance(Request $request)
    {
        $item = new EvidanceLevel3();
        $item->id_detaillvl3 = $request->id_detaillvl3;
        $item->nama_gambar = $request->nama_gambar;
        
        $this->validate($request,
          [
            'path_gambar.required' => 'Gambar wajib diunggah.',
            'path_gambar.image' => 'File harus berupa gambar.',
            'path_gambar.mimes' => 'Format gambar harus jpeg, png, atau jpg.',
            'path_gambar.max' => 'Gambar tidak boleh lebih dari 5MB.',
        ]);
    
        if ($request->hasFile('path_gambar') && $request->file('path_gambar')->isValid()) {
            $item['path_gambar'] = $request->file('path_gambar')->store('assets/gallery', 'public');
            $item->save();
            return redirect()->back()->with('success', 'Berhasil menambahkan gambar evidance');
        } else {
            return redirect()->back()->with('failed','Pastikan format gambar benar dan gambar tidak boleh lebih dari 5MB');
        }
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
        $data = DetailLevel3::findOrFail($id);
        $item = $request->all();

        $data->update($item);
        return redirect()->back()->with('success', 'Berhasil edit meeting');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailLevel3 $id)
    {
        $id->delete();
        sleep(1);
        return redirect()->back()->with('success', 'Berhasil hapus tabel');
    }
    
        
}
