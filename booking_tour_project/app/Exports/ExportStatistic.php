<?php

namespace App\Exports;

use App\Services\ChartService;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportStatistic implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'STT',
            'Date',
            'Total'
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $service = new ChartService();
        $values = $service->exportExcel();
        for($i = 0; $i < count($values['data']); $i++){
            $x = 0;
            $data[$i][$x++] = $i;
            $data[$i][$x++] = $values['date'][$i];
            $data[$i][$x++] = $values['data'][$i];
        }
        return collect($data);
    }
}
