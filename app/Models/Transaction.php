<?php

namespace App\Models;

use App\Exports\Exportable;
use App\Exports\TransactionExport;
use Cknow\Money\Casts\MoneyIntegerCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model implements Exportable
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    public $casts = [
        'date' => 'datetime',
        'amount' => MoneyIntegerCast::class
    ];

    public function exporter(...$args)
    {
        return new TransactionExport(...$args);
    }
}
