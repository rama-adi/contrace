<?php

namespace App\View\Components;

use App\Support\Fields\BannerField as Field;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Tanthammar\TallForms\Traits\Helpers;

class formBannerField extends Component
{
    public Field $field;

    /**
     * Create a new component instance.
     *
     * @param Field $field
     */
    public function __construct(Field $field)
    {
        $this->field = $field;
    }

    public function options(): array
    {
        $custom = $this->field->getAttr('input');
        $default = [
            $this->field->wire => $this->field->key,
            'type' => 'text', //example when using an input field
            'name' => $this->field->key,
            'class' => $this->class()
        ];
        return array_merge($default, $custom);
    }

    public function class()
    {
        $class = "form-input my-1 w-full "; //example class from a default input field
        $class .= $this->field->class;
        return Helpers::unique_words($class);
    }

    public function error()//example class from a default input field
    {
        return Helpers::unique_words($this->class() . " border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red");
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.forms.banner-field');
    }
}
