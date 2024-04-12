<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Record extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'bpm',
        'listing_date',
        'price',
        'UID',
        'is_exclusive',
        'audio_file',
        'notes',
    ];

    public function tags() {
        return $this->belongsToMany(Tag::class, 'record_tag');
    }

    public function libraries() {
        return $this->belongsToMany(Library::class, 'record_library');
    }

    public function instruments() {
        return $this->belongsToMany(Instrument::class, 'record_instrument');
    }

    public function eras() {
        return $this->belongsToMany(Era::class, 'record_era');
    }
}
