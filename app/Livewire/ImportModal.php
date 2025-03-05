<?php

namespace App\Livewire;

use App\Jobs\MarkImportComplete;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Maatwebsite\Excel\Excel;

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

        $model->importer()
            ->queue($this->file->getRealPath(), null, Excel::CSV)
            ->chain([
                new MarkImportComplete($import),
                // can also send an email when complete
            ]);

        return redirect()->route('imports');
    }

    public function render()
    {
        return view('livewire.import-modal');
    }
}
