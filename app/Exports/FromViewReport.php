<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FromViewReport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function __construct($report)
    {
        $this->report = $report;
    }


    public function view() :View
    {
        //
        return view('downloads.excel')->with([
            'reports' => $this->report,
        ]);
    }
}
