<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailLevel1;
use App\Models\MeetingLevel1;
use App\Models\EvidanceLevel1;
use App\Models\PIC;
use App\Models\Status;
use App\Models\User;
use DB;
use PDF;
use App\Exports\DetailLevel1Export;
use App\Exports\FormatingLevel1Upload;
use App\Imports\DetailLevel1Import;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Spatie\Permission\Models\Role;
use Notification;
use App\Notifications\GenerateDetailNotification;


class DetailLvl1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,$id)
    {
        $user = auth()->user();
        $roles = $user->getRoleNames();
        $akunPic= $user->pic;

        $pic = PIC::all();
        $status = Status::all();
        $item = MeetingLevel1::findOrFail($id);
        $rolesToCheck = ["ADMIN", "Project Management"];

        if ($roles->intersect($rolesToCheck)->isNotEmpty()) {
            $detail = DetailLevel1::get();
        } else {
            $detail = DetailLevel1::where('pic', $akunPic)->get();
        }

        auth()->user()->unreadNotifications->where('id',request('id'))->first()?->markAsRead();
        
        return view ('MOM.MoM1.detail',
        [
            'item'=>$item,
            'pic' => $pic,
            'status' => $status,
            'details' => $detail
        ]);


    }
    public function cetak_pdf($id)
    {
        $item = MeetingLevel1::findOrFail($id);
        $pdf = PDF::loadview('MOM.MoM1.detail_level_1_pdf',
        [
            'item'=>$item,
            'details' => DetailLevel1::get()
        ]);
    	return $pdf->stream('laporan-detail-level-1-pdf');
    }
    
    public function cetak_excel($id)
    {
        return Excel::download(new DetailLevel1Export($id), 'MoM-Level-1.xlsx');
    }

    public function upload_excel(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DetailLevel1',$namaFile);

        Excel::import(new DetailLevel1Import, public_path('/DetailLevel1/'.$namaFile ));
        return redirect()->back()->with('success', 'Berhasil Import Meeting');
    }

    public function format_excel($id)
    {
        $export = new FormatingLevel1Upload($id);

        return Excel::download($export, 'template-MoM-1.xlsx');
    }


    public function cetak_word($id)
    {
        // Inisialisasi objek PHPWord
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        $data = DetailLevel1::where('id_meeting', $id)->get();

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
        // $item = new DetailLevel1();
        // $item->id_meeting = $request->id;
        // $item->point_of_meeting = $request->point_of_meeting;
        // $item->pic = $request->pic;
        // $item->due = $request->due;
        // $item->status = $request->status;
        // $item->save();
        $level = 1;
        $nama = $request->user()->name;
        $user = auth()->user();
        $pic = $request->pic;
        $item = [
            'id_meeting' => $request->id,
            'point_of_meeting' => $request->point_of_meeting,
            'pic' => $request->pic,
            'due' => $request->due,
            'status' => $request->status,
        ];
        $data = DetailLevel1::create($item);
        $roleName = $request->pic; // Ganti dengan peran yang Anda inginkan
        $usersWithPic = User::where('pic', $pic)
        ->where('level1', 1)
        ->get();
        Notification::send($usersWithPic, new GenerateDetailNotification($data,$level,$nama,$pic));
        return redirect(route('detail1.index', $request->id));
    }

    public function store_evidance(Request $request)
    {
        $item = new EvidanceLevel1();
        $item->id_detaillvl1 = $request->id_detaillvl1;
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
        $level = 1;
        $nama = $request->user()->name;
        $user = auth()->user();
        $pic = $request->pic;
        $data = DetailLevel1::findOrFail($id);
        $item = $request->all();

        $roleName = "ADMIN"; // Ganti dengan nama peran "ADMIN"
        $userAdmin = User::whereHas('roles', function ($query) use ($roleName) {
            $query->where('name', $roleName);
        })->get();
        Notification::send($userAdmin, new GenerateDetailNotification($data, $level, $nama,$pic));

        $usersWithPic = User::where('pic', $pic)
        ->where('level1', 1)
        ->get();
        Notification::send($usersWithPic, new GenerateDetailNotification($data, $level, $nama,$pic));

        $data->update($item);
        return redirect()->back()->with('success', 'Berhasil edit meeting');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailLevel1 $id)
    {
        $id->delete();
        sleep(1);
        return redirect()->back()->with('success', 'Berhasil hapus tabel');
    }
}
