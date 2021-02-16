<?php


namespace App\Support\Traits;


trait TurboRedirect
{
    public function turboRedirect(string $route, ?string $message = null)
    {
        if($message){
            session()->flash('successState', $message);
        }

        $this->redirect($route);
    }
}
