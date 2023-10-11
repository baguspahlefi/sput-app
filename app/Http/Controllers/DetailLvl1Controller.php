<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailLevel1;
use App\Models\MeetingLevel1;
use App\Models\PIC;

class DetailLvl1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        // $pic = PIC::all();
        // // $item = MeetingLevel1::findOrFail($id);
        // return view ('MoM.MoM1.detail',
        // [
        //     'pic' => $pic,
        //     'items' => $item,
        //     'details' => DetailLevel1::all(),
        // ]);
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
        return redirect(route('detail.show', $item->id_meeting_level_1));
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
