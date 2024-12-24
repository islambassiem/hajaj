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
        $file = $request->file('file');
        $path = $file->store('temp');
        return response()->json([
            'path' => $path
        ]);
    }
}
