<?php

namespace App\Http\Livewire\Ui\Visitation;

use App\Models\Location;
use App\Models\Visitor;
use Livewire\Component;
use Livewire\WithPagination;

class VisitationTable extends Component
{
    use WithPagination;

    public Location $location;
    public int $page_num = 10;



    public function render()
    {
        return view('livewire.ui.visitation.visitation-table')->with([
            'visitors' => Visitor::where('team_id', $this->location->team_id)
                ->orderBy('created_at')
                ->paginate($this->page_num)
        ]);
    }
}
