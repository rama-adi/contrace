<?php

namespace App\Http\Livewire\Ui;

use App\Models\Location;
use App\Models\Team;
use Livewire\Component;

class ShareLocation extends Component
{
    public Location $location;
    public Team $team;
    public bool $showSharebox = false;

    public function render()
    {

        return view('livewire.ui.share-location');
    }
}
