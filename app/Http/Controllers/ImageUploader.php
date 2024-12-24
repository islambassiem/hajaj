<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploader extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $files = $request->file('file');
        $paths = [];
        foreach ($files as $file) {
            $paths[] = $file->store('temp');
        }
        return $paths;
    }
}
