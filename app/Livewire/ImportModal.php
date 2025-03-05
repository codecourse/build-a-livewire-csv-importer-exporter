<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

class ImportModal extends ModalComponent
{
    public string $model;

    public function render()
    {
        return view('livewire.import-modal');
    }
}
