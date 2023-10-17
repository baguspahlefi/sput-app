<?php

namespace App\Exports;

use App\Models\DetailLevel2;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Illuminate\Support\Collection;

class DetailLevel2Export implements FromCollection,WithHeadings,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
    
    public function collection()
    {
        $data = DetailLevel2::where('id_meeting_level_2', $this->id)->get();
  
        return $data;
    }

    public function headings(): array
    {
        return [
            ['NO','ID Meeting Level 2','Point Of Meeting','PIC','DUE','STATUS'], // Judul kolom dalam array
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['argb' => 'FFFF00'], // Warna latar belakang kuning
                ],
            ],
        ];
    }

}
