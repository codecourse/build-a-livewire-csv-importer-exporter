<?php

namespace App\Jobs;

use App\Models\Export;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class MarkExportComplete implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Export $export)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->export->touch('completed_at');
    }
}
