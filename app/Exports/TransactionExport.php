<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithCustomChunkSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransactionExport implements FromQuery, WithMapping, WithHeadings, WithCustomChunkSize
{
    use Exportable;

    public function __construct(protected array $ids)
    {
        //
    }

    public function query()
    {
        return Transaction::query()
            ->when(count($this->ids), function ($query) {
                $query->find($this->ids);
            });
    }

    public function headings(): array
    {
        return [
            'Transaction ID',
            'Descriptor',
            'Amount',
            'Date'
        ];
    }

    public function map($transaction): array
    {
        return [
            $transaction->transaction_id,
            $transaction->descriptor,
            $transaction->amount,
            $transaction->date,
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
