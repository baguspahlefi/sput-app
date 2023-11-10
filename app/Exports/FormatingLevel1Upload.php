<?php

namespace App\Exports;

use App\Models\DetailLevel1;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Illuminate\Support\Collection;

class FormatingLevel1Upload implements FromCollection,WithHeadings,WithStyles
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
        $data = [
            [
                '1',
                $this->id, // ID Meeting Level 1
                'Test Point Of Meeting',
                'PLANT',
                '2023-07-01                ',
                'OPEN',
            ]
        ];

        return collect($data);
    }

    public function headings(): array
    {
        return [
            ['No','ID Meeting Level 1','Point Of Meeting','PIC','DUE','STATUS'], // Judul kolom dalam array
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
