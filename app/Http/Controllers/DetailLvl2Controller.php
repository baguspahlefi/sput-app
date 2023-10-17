<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailLevel2;
use App\Models\MeetingLevel2;
use App\Models\EvidanceLevel2;
use App\Models\PIC;
use App\Models\Status;
use DB;
use PDF;
use App\Exports\DetailLevel2Export;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;


class DetailLvl2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $pic = PIC::all();
        $status = Status::all();
        $item = MeetingLevel2::findOrFail($id);
        return view ('MOM.MoM2.detail',
        [
            'item'=>$item,
            'pic' => $pic,
            'status' => $status,
            'details' => DetailLevel2::get()
        ]);


    }

    public function cetak_pdf($id)
    {
        $item = MeetingLevel2::findOrFail($id);
        $pdf = PDF::loadview('MOM.MoM2.detail_level_2_pdf',
        [
            'item'=>$item,
            'details' => DetailLevel2::get()
        ]);
    	return $pdf->stream('laporan-detail-level-2-pdf');


    }
    public function cetak_excel($id)
    {
        return Excel::download(new DetailLevel2Export($id), 'MoM-Level-2.xlsx');
    }


    public function cetak_word($id)
    {
        // Inisialisasi objek PHPWord
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        $data = DetailLevel2::where('id_meeting_level_2', $id)->get();

        // Mulai tabel HTML
        $htmlContent = '<table border="1">';
        $htmlContent .= '<tr>';
        $htmlContent .= '<th>No</th>';
        $htmlContent .= '<th>Point Of Meeting</th>';
        $htmlContent .= '<th>Status</th>';
        $htmlContent .= '<th>Due</th>';
        $htmlContent .= '<th>PIC</th>';
        $htmlContent .= '</tr>';

        // Loop melalui data dan tambahkan baris-baris ke tabel
        foreach ($data as $key => $detail) {
            $htmlContent .= '<tr>';
            $htmlContent .= '<td>' . ($key + 1) . '</td>'; // No
            $htmlContent .= '<td>' . $detail->point_of_meeting . '</td>'; // Point Of Meeting
            $htmlContent .= '<td>' . $detail->status . '</td>'; // Status
            $htmlContent .= '<td>' . $detail->due . '</td>'; // Due
            $htmlContent .= '<td>' . $detail->pic . '</td>'; // PIC
            $htmlContent .= '</tr>';
        }

        // Tutup tabel HTML
        $htmlContent .= '</table>';

// Sekarang Anda bisa menggunakan $htmlContent dalam kode sebelumnya untuk mengonversinya ke dokumen Word.


        // Tambahkan HTML ke dokumen
        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $htmlContent);

        // Simpan dokumen sebagai file
        $phpWord->save('dokumen_word.docx');

        // Kembalikan dokumen ke browser
        return response()->download('dokumen_word.docx')->deleteFileAfterSend(true);
        
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
        $item = new DetailLevel2();
        $item->id_meeting_level_2 = $request->id;
        $item->point_of_meeting = $request->point_of_meeting;
        $item->pic = $request->pic;
        $item->due = $request->due;
        $item->status = $request->status;
        $item->save();
        return redirect(route('detail2.index', $item->id_meeting_level_2));
    }

    public function store_evidance(Request $request)
    {
        $item = new EvidanceLevel2();
        $item->id_detaillvl2 = $request->id_detaillvl2;
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
        $data = DetailLevel2::findOrFail($id);
        $item = $request->all();

        $data->update($item);
        return redirect()->back()->with('success', 'Berhasil edit meeting');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailLevel2 $id)
    {
        $id->delete();
        sleep(1);
        return redirect()->back()->with('success', 'Berhasil hapus tabel');
    }
    
        
}
