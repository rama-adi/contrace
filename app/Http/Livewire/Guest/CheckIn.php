<?php

namespace App\Http\Livewire\Guest;

use App\Models\Location;
use App\Models\Team;
use App\Models\Visitor;
use App\Support\Traits\HasLivewireAlert;
use DB;
use Livewire\Component;

class CheckIn extends Component
{
    use HasLivewireAlert;

    public Location $location;
    public Team $team;
    public int $pageNo = 1;

    public array $form = [
        'people_amount' => '1',
        'pos_lat' => 0,
        'pos_long' => 0
    ];

    public function render()
    {
        return view('livewire.guest.check-in');
    }

    public function submit()
    {
        $this->validate([
            'form.citizen_no' => 'required|digits:16|numeric',
            'form.phone_no' => 'required|digits:11|numeric',
            'form.name' => 'required',
            'form.people_amount' => "required|numeric|max:{$this->location->max_company}",
            'form.pos_lat' => "required",
            'form.pos_long' => "required",
        ]);

        try {

            DB::transaction(function () {
                return tap(Visitor::create([
                    'location_id' => $this->location->id,
                    'team_id' => $this->team->id,
                    'citizen_no' => $this->form['citizen_no'],
                    'name' => $this->form['name'],
                    'phone_no' => $this->form['phone_no'],
                    'people_amount' => (int)$this->form['people_amount'],
                    'pos_lat' => $this->form['pos_lat'],
                    'pos_long' => $this->form['pos_long'],
                ]), function () {
                    $this->pageNo = 2;
                });
            });

        } catch (\Exception $e) {
            $this->showToast('Gagal menyimpan, pastikan data sudah benar!');
        }

    }
}
