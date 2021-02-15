<?php


namespace App\Support\Fields;


use Tanthammar\TallForms\BaseField;

class BannerField extends BaseField
{
    public function overrides(): self
    {
        $this->type = 'banner-field'; //required property!
        return $this;
    }
}
