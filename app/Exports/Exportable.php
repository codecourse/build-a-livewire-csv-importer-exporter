<?php

namespace App\Exports;

interface Exportable
{
    public function exporter(...$args);
}
