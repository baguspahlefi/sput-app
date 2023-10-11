<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailLevel1;
use App\Models\MeetingLevel1;

class DetailLvl1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $item = MeetingLevel1::findOrFail($id);
        return view ('MoM.MoM1.detail',
        [
            'items' => $item,
            'details' => DetailLevel1::get(),
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
