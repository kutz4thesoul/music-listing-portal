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
    return view('dashboard',['records' => Record::with(['tags', 'libraries', 'instruments', 'eras'])->get()]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/add-edit-record', [RecordController::class, 'addEditRecord'])->name('add-record');
    Route::get('/add-edit-record/{id}', [RecordController::class, 'addEditRecord'])->name('edit-record');
    Route::post('/save-record', [RecordController::class, 'store'])->name('save-record');
    Route::put('/save-record/{id}', [RecordController::class, 'store'])->name('update-record');
    Route::get('/delete-record/{id}', [RecordController::class, 'destroy'])->name('delete-record');
    Route::get('/detail/{id}', [RecordController::class, 'showById'])->name('detail');
    Route::get('/admin', function() {
        return view('admin');
    })->name('admin');
});

require __DIR__.'/auth.php';
