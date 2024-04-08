<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'slug',
        'url',
    ];

    public function records() {
        return $this->hasMany(Record::class, 'library_id');
    }
}
