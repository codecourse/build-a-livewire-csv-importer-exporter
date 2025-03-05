<?php

namespace App\Imports;

use App\Models\Transaction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class TransactionImport implements ToModel, WithChunkReading, ShouldQueue, WithHeadingRow, WithUpserts
{
    use \Maatwebsite\Excel\Concerns\Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Transaction([
            'transaction_id' => $row['transaction_id'],
            'descriptor' => $row['descriptor'],
            'amount' => $row['amount'],
            'date' => $row['date'],
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function uniqueBy()
    {
        return 'transaction_id';
    }
}
