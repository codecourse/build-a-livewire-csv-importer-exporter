<?php

namespace App\Livewire;

use Livewire\Component;

class ImportTable extends Component
{
    public function render()
    {
        return view('livewire.import-table', [
            'imports' => auth()->user()->imports()->latest()->paginate(10)
        ]);
    }
}
