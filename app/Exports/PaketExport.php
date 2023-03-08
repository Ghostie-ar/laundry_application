<?php

namespace App\Exports;

use App\Models\Paket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeading;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use \Maatwebsite\Excel\Concerns\Sheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\DB;



class PaketExport implements FromCollection, WithHeading, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Paket::where('id_outlet', auth()->user()->id_outlet)->get();
    }
    // public function heading(): array{
    //     return[
    //         'No.',
    //         'ID Outlet',
    //         'Jenis',
    //         'Nama Paket',
    //         'Harga',
    //         'Tanggal Input',
    //         'Tanggal Update'
    //     ];
    // }
    // public function registerEvents(): array{
    //     return[
    //         AfterSheet::class => function(AfterSheet $event){
    //             $event->sheet->getColumnDimension('A')->setAutoSize(true);
    //             $event->sheet->getColumnDimension('B')->setAutoSize(true);
    //             $event->sheet->getColumnDimension('C')->setAutoSize(true);
    //             $event->sheet->getColumnDimension('D')->setAutoSize(true);
    //             $event->sheet->getColumnDimension('E')->setAutoSize(true);

    //             $event->sheet->insertNewRowBefore(1,2);
    //             $event->sheet->mergeCells('A1:G1');
    //             $event->sheet->setCellValue('A1', 'DATA PAKET CUCIAN');
    //             $event->sheet->getStyle('A1')->getFont()->setBold(true);
    //             $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    //             $event->sheet->getStyle('A3:G'.$event->sheet->getHighestRow())->applyFromArray([
    //                 'borders'=>[
    //                     'allBorders'=>[
    //                         'borderStyle'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
    //                         'color' => ['argb' => '000000']
    //                     ]
    //                 ]
    //                     ]);

    //         }
    //     ];
    // }
}
