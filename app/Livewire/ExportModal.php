<?php

namespace App\Livewire;

use App\Exports\TransactionExport;
use Livewire\Attributes\Computed;
use LivewireUI\Modal\ModalComponent;
use Maatwebsite\Excel\Facades\Excel;

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
        $model = (new $this->model);

        $export = auth()->user()->exports()->create([
            'record_count' => $this->recordCount
        ]);

        $export->update([
            'file' => $model->getTable() . '-' . str($export->created_at)->replace(':', '-')->slug() . '.csv'
        ]);

        Excel::store($model->exporter($this->ids), $export->file, 'local', \Maatwebsite\Excel\Excel::CSV);
    }

    public function render()
    {
        return view('livewire.export-modal');
    }
}
