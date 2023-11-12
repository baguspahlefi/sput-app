<?php

namespace App\Exports;

use App\Models\DetailLevel1;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Illuminate\Support\Collection;

class DetailLevel1Export implements FromCollection,WithHeadings,WithStyles
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
        $data = DetailLevel1::where('id_meeting', $this->id)->get();
  
         // Exclude columns 1 and 2 from the collection
         $modifiedData = $data->map(function ($item) {
            return collect($item->toArray())->except(['id_meeting','created_at','updated_at']);
        });

        return $modifiedData;
    }

    public function headings(): array
    {
        return [
            ['NO','Point Of Meeting','PIC','DUE','STATUS'], // Judul kolom dalam array
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
