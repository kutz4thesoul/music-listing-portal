<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/add-edit', function() {
        return view('add-edit-record');
    });
    Route::get('/detail', function() {
        $item = new stdCLass();
        $item->title = 'My First Record';
        $item->bpm = 120;
        $item->listing_date = '2021-01-01';
        $item->price = 10.00;
        $item->UID = 1;
        $item->is_exclusive = true;
        $item->audio_file = asset('records/synth-beat.mp3');
        $item->notes = 'This is my first record';
        return view('detail', ['item' => $item]);
    });
});

require __DIR__.'/auth.php';
