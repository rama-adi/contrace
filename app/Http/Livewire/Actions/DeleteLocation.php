<?php

namespace App\Http\Livewire\Actions;

use App\Models\Location;
use App\Support\Traits\TurboRedirect;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class DeleteLocation extends Component
{
    use TurboRedirect;

    public Location $location;
    public bool $showDeleteForm = false;

    public function render()
    {
        return view('livewire.actions.delete-location');
    }

    public function deleteLocation()
    {
        Storage::disk('public')->delete($this->location->banner);
        Storage::disk('public')->delete($this->location->icon);
        $this->location->delete();
        $this->turboRedirect(route('dashboard'), 'Anda baru saja menghapus sebuah tim!');

    }
}
