<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExportDownloadRequest;
use App\Models\Export;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExportController extends Controller
{
    public function download(ExportDownloadRequest $request, Export $export)
    {
        return Storage::download(auth()->id() . '/' . $export->file);
    }
}
