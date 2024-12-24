<?php

use App\Http\Controllers\ImageUploader;
use App\Http\Controllers\LocaleController;
use App\Http\Middleware\SetLocale;
use App\Livewire\Ad;
use App\Livewire\Category;
use App\Livewire\Post;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return redirect('/category');
});


Route::get('/lang/{lang}', [LocaleController::class, 'syncDirection'])
    ->middleware(SetLocale::class)
    ->name('lang');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/download-seed', function () {
    // ini_set('max_execution_time', 0);
    // $path = storage_path('/app/public/photos/');
    // for ($id=0; $id <= 1084 ; $id++) {
    //     $url = "https://picsum.photos/id/$id/600/400";
    //     $headers = get_headers($url, 1);
    //     if (strpos($headers[0], '404')) continue;
    //     file_put_contents($path . $id . ".jpg", file_get_contents($url));
    // }
    // $files = collect(preg_grep('/^([^.])/', scandir($path)));
    // $posts = \App\Models\Post::all();
    // foreach ($posts as $post) {
    //     $count = mt_rand(5, 10);
    //     for ($i = 0; $i <= $count; $i++) {
    //         $post->addMedia($path . $files->random())
    //             ->preservingOriginal()
    //             ->toMediaCollection();
    //     }
    // }

});

Route::get('/category/{slug?}', Category::class)->name('category');
Route::get('/post/{post}', Post::class)->name('post');
Route::post('/ad', Ad::class)->name('ad');
Route::post('/upload', ImageUploader::class)->name('ad.upload');
