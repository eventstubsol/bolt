<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class UserReport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $report;

    public function __construct($report)
    {   
        $this->report = $report;
    }

    public function collection()
    {
        //
        Excel::create('User_Report', function($excel) use($this->report) {

            $excel->sheet('Report', function($sheet) use($report) {
        
                $sheet->fromArray($report);
        
            });
        
        })->download('xls');
    }
}
