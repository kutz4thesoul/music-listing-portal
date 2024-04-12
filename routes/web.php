<?php

use App\Models\Era;
use App\Models\Tag;
use App\Models\Record;
use App\Models\Library;
use App\Models\Instrument;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard',['records' => Record::all()]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/add-edit-record', function() {
        return view('add-edit-record', ['tags' => Tag::all(), 'libraries' => Library::all(), 'instruments' => Instrument::all(), 'eras' => Era::all()]);
    })->name('add-edit-record');
    Route::post('/save-record', [RecordController::class, 'store'])->name('save-record');
    Route::get('/detail/{id}', [RecordController::class, 'show'])->name('detail');
    Route::get('/admin', function() {
        return view('admin');
    })->name('admin');
});

require __DIR__.'/auth.php';
