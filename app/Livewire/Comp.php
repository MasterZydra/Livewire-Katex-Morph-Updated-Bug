<?php

namespace App\Livewire;

use Livewire\Component;

class Comp extends Component
{
    public $strProp = "";

    public function btnClick()
    {
        $this->strProp .= "a"; // Some modification on a property
    }

    public function render()
    {
        return view('livewire.comp');
    }
}
