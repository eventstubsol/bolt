<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RoomReport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($report,$location,$locationType)
    {
        $this->report = $report;
        $this->location = $location;
        $this->locationType = $locationType;
    }

    public function view() :View
    {
        //
        return view('downloads.room')->with([
            'reports' => $this->report,
            'location' => $this->location,
            'locationType'=>$this->locationType
        ]);
    }
}
