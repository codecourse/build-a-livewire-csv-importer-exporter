<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class ImportModal extends ModalComponent
{
    use WithFileUploads;

    public string $model;

    #[Validate('required|mimes:csv|max:10240')]
    public $file;

    #[Computed()]
    public function recordCount(): int
    {
        $file = new \SplFileObject($this->file->getRealPath(), 'r');
        $file->seek(PHP_INT_MAX);

        return $file->key() - 1;
    }

    public function startImport()
    {
        $model = (new $this->model);

        $import = auth()->user()->imports()->create([
            'record_count' => $this->recordCount
        ]);

        dd($import);
    }

    public function render()
    {
        return view('livewire.import-modal');
    }
}
