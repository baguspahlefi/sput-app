<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\pic;

class PengaturanAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = User::all();
        $pic = pic::all();
        return view('pengaturanAkun.index',
        [
            'items' => $items,
            'pic' => $pic
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
    public function storeAkun(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nrp' => $request->nrp,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->pic);
        return redirect()->route('pengaturanAkun.index')->with('flash_message_success','Berhasil menambahkan user');
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
        $user = User::findOrFail($id);
        $data = $request->all();

        $user->syncRoles($request->pic);
        $user->update($data);
        return redirect()->route('pengaturanAkun.index')->with('flash_message_success','Update Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
