<?php

namespace App\Exports;

use App\Models\Visitor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class VisitorsExport implements FromView
{
    public int $locId;
    public function __construct($id)
    {
        $this->locId = $id;
    }

    public function view(): View
    {
        return view('excels.visitors')->with([
            'visitors' => Visitor::where('location_id', $this->locId)->get()
        ]);
    }
}
