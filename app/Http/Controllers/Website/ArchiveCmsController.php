<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ArchiveCms;

class ArchiveCmsController extends Controller
{
    public function show($id)
    {
        $archive = ArchiveCms::with([
            'translations.language',
            'archiveMember'
        ])->findOrFail($id);

        return view(
            'website.archive.show',
            compact('archive')
        );
    }
}