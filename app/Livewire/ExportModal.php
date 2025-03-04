<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use LivewireUI\Modal\ModalComponent;

class ExportModal extends ModalComponent
{
    public string $model;

    public array $ids;

    public function builder()
    {
        return $this->model::query();
    }

    #[Computed()]
    public function recordCount(): int
    {
        return count($this->ids) ?: $this->builder()->count();
    }

    public function startExport()
    {
        dd($this->ids);
    }

    public function render()
    {
        return view('livewire.export-modal');
    }
}
