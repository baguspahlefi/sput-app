<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailLevel1;
use App\Models\MeetingLevel1;
use App\Models\EvidanceLevel1;
use App\Models\PIC;
use App\Models\Status;
use DB;

class DetailLvl1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
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
        $item = new DetailLevel1();
        $item->id_meeting_level_1 = $request->id;
        $item->point_of_meeting = $request->point_of_meeting;
        $item->pic = $request->pic;
        $item->due = $request->due;
        $item->status = $request->status;
        $item->save();
        return redirect(route('detail.index', $item->id_meeting_level_1));
    }

    public function store_evidance(Request $request)
    {
        $meetingLevel1 = MeetingLevel1::first();
        $item = new EvidanceLevel1();
        $item->id_detaillvl1 = $request->id_detaillvl1;
        $item->nama_gambar = $request->nama_gambar;
        $this->validate($request,[
            'path_gambar' => 'required|image|mimes:jpeg,png,jpg|max:5000'
        ]);
        $item['path_gambar'] = $request->file('path_gambar')->store(
            'assets/gallery','public'
        );
        $item->save();
        return redirect(route('detail.index', $meetingLevel1->id))->with('flash_message_success','Berhasil menambahkan user');
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
    public function destroy(DetailLevel1 $id)
    {
        $meetingLevel1 = MeetingLevel1::first();
        DB::delete('DELETE FROM evidance_level1 WHERE id_detaillvl1 = ?', [$id]);
        $id->delete();
        sleep(1);
        return redirect(route('detail.index', $meetingLevel1->id));
    }
    
        
}
