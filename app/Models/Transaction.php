<?php

namespace App\Models;

use App\Exports\Exportable;
use App\Exports\TransactionExport;
use App\Imports\Importable;
use App\Imports\TransactionImport;
use Cknow\Money\Casts\MoneyIntegerCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model implements Exportable, Importable
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    protected $guarded = false;

    public $casts = [
        'date' => 'datetime',
        'amount' => MoneyIntegerCast::class
    ];

    public function exporter(...$args)
    {
        return new TransactionExport(...$args);
    }

    public function importer(...$args)
    {
        return new TransactionImport(...$args);
    }
}
