<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ImageUploader extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2',
            'post_id'
        ],attributes: [
            'file' => __('file')
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 404);
        }
        $post_id = $request->post_id;
        $file = $request->file('file');

        $fileName = md5(rand() . $file->getClientOriginalName());
        $post = Post::find($post_id);
        $post->addMediaFromRequest('file')
            ->usingFileName($fileName . '.' . $file->getClientOriginalExtension())
            ->usingName($fileName)
            ->toMediaCollection();
        return response()->json([
            'media' => $fileName
        ]);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'media' => 'required'
        ]);
        $media = Media::where('name', $request->media)->first();
        $media->delete();
    }
}
