<?php

namespace App\Http\Livewire\Forms;

use App\Models\Location;
use App\Support\Traits\TfCropperUpload;
use App\Support\Traits\TurboRedirect;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Tanthammar\TallForms\ImageCropper;
use Tanthammar\TallForms\Input;
use Tanthammar\TallForms\TallForm;
use Tanthammar\TallForms\Trix;

class LocationForm extends Component
{
    use TurboRedirect, TallForm, TfCropperUpload;

    public function mount(?Location $location)
    {
        //Gate::authorize()
        $this->fill([
            'formTitle' => 'Lokasi',
            'wrapWithView' => true, //see https://github.com/tanthammar/tall-forms/wiki/Wrapper-Layout
            'showGoBack' => false,
        ]);
        $this->mount_form($location); // $location from hereon, called $this->model
    }


    // Mandatory method
    public function onCreateModel($validated_data)
    {
        // Set the $model property in order to conditionally display fields when the model instance exists, on saveAndStayResponse()
        $this->model = Location::create(array_merge($validated_data, [
            'team_id' => Auth::user()->currentTeam->id,
            'banner' => $this->save_to_storage($this->form_data['banner'], 'image/banners', 1000, 400),
            'icon' => $this->save_to_storage($this->form_data['icon'], 'image/icons', 400, 400)
        ]));

        $this->turboRedirect(route('dashboard'), 'Berhasil membuat lokasi baru!');
    }

    // OPTIONAL method used for the "Save and stay" button, this method already exists in the TallForm trait
    public function onUpdateModel($validated_data)
    {
        $this->model->update(array_merge($validated_data, $this->doImageReplacement($this->form_data)));
        $this->turboRedirect(route('dashboard'), 'Berhasil mengubah info lokasi ini!');
    }

    public function fields()
    {
        return [
            Input::make('Nama lokasi', 'name')
                ->rules('required'),

            ImageCropper::make('Logo', 'icon')
                ->width(400)
                ->height(400)
                ->square()
                ->thumbnail('w-1/4')
                ->includeExternalScripts() //will only be included once if multiple imageCropper fields.
                ->dropZoneHelp('Drag image disini atau klik utk mengupload')
                ->help('Upload logo anda (Rekomendasi ukuran 400 x 400)'),

            ImageCropper::make('Banner', 'banner')
                ->width(1000)
                ->height(400)
                ->square()
                ->thumbnail('h-1/4')
                ->includeExternalScripts() //will only be included once if multiple imageCropper fields.
                ->dropZoneHelp('Drag image disini atau klik utk mengupload')
                ->help('Upload banner anda (Rekomendasi ukuran 400 x 1000)'),


            Trix::make('Deskripsi', 'body')
                ->includeExternalScripts()
                ->rules('required')
                ->help('akan ditampilkan dibawah banner anda'),

            Input::make('Jumlah maksimal pendamping', 'max_company')
                ->type('number')
                ->rules('required')
                ->default(9),

            Trix::make('Perjanjian pengunjung', 'agreement')
                ->rules('required')
                ->includeExternalScripts()
                ->default(view('standalone.agreement-template')->render())
                ->help('perjanjian yang harus disetujui sebelum memasuki outlet')
        ];
    }

    protected function doImageReplacement($form): array
    {
        $arr = [];
        if (filled($form['banner']) && $form['banner'] !== $this->model->banner) {
            $arr['banner'] = $this->save_to_storage($form['banner'], 'image/banners', 1000, 400);
            $this->delete_from_storage($this->model->banner);
        }

        if (filled($form['icon']) && $form['icon'] !== $this->model->icon) {
            $arr['icon'] = $this->save_to_storage($form['icon'], 'image/icons', 400, 400);
            $this->delete_from_storage($this->model->icon);
        }

        return filled($arr) ? $arr : [];

    }

}
