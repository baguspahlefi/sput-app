<?php

namespace App\Exports;

use App\Models\DetailLevel2;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class ReportDetailLevel2Export implements FromCollection,WithHeadings,WithStyles
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
        $query = DetailLevel2::query();
        $startDate = $this->startDate ? Carbon::parse( $this->startDate)->format('Y-m-d') : null;
        $endDate = $this->endDate ? Carbon::parse($this->endDate)->format('Y-m-d') : null;
        if (!$this->startDate && !$this->endDate) {
            // Filter status close without date filtering
            $query->where('status', 'close');
        } else {
            // If startDate and/or endDate are provided, apply date filtering
            if ($this->startDate && $this->endDate) {
                $query->whereBetween('due', [$startDate, $endDate]);
            }
    
            // Always filter status close regardless of date filtering
            $query->where('status', 'close');
        }

        $data = $query->get();
  
         // Exclude columns 1 and 2 from the collection
         $modifiedData = $data->map(function ($item) {
            return collect($item->toArray())->except(['id_meeting','created_at','updated_at']);
        });

        return $modifiedData;
    }

    public function startCol(): int
    {
        return 2;
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