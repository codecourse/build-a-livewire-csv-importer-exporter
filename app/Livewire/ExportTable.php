<?php

namespace App\Livewire;

use Livewire\Component;

class ExportTable extends Component
{
    public function render()
    {
        return view('livewire.export-table', [
            'exports' => auth()->user()->exports()->latest()->paginate(10)
        ]);
    }
}
