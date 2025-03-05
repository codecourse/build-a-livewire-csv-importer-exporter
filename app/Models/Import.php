<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    protected $guarded = false;

    public $casts = [
        'completed_at' => 'datetime'
    ];

    public function isReady(): bool
    {
        return !is_null($this->completed_at);
    }
}
