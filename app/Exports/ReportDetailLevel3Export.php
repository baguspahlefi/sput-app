<?php

namespace App\Exports;

use App\Models\DetailLevel3;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Illuminate\Support\Collection;

class ReportDetailLevel3Export implements FromCollection,WithHeadings,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $startDate;
    protected $endDate;

    public function __construct($startDate,$endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    
    public function collection()
    {
        $query = DetailLevel3::query();
        if ($this->startDate && $this->endDate) {
            $query->whereBetween('due', [$this->startDate, $this->endDate]);
        }

        $query->where('status', 'close');

        $data = $query->get();
  
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