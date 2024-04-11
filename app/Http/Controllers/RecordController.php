<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecordController extends Controller
{
    public function store(Request $request) {

        $tags       = [];
        $libraries  = [];

        // Extract tag ID's from the request
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'tag_') === 0) {
                $tags[] = substr($key, 4);
            }
        }
        
        // validate form fields
        $request->validate([
            'title' => 'required',
            'bpm' => 'required|numeric',
            'listing_date' => 'required|date',
            'price' => 'required|numeric',
            'audio_file' => 'required|file|mimes:mp3'
        ]);

        // store audio file
        $audio_file = $request->file('audio_file');
        if ($audio_file->isValid()) {
            $audio_file->storeAs('records', strtolower(str_replace(' ', '-', $audio_file->getClientOriginalName())));
        }

        // create a new record
        $record = new Record();
        $record->title = $request->title;
        $record->bpm = $request->bpm;
        $record->listing_date = $request->listing_date;
        $record->price = $request->price;
        $record->UID = $request->UID;
        $record->is_exclusive = ( 'on' == $request->is_exclusive ) ? 1 : 0;
        $record->audio_file = strtolower(str_replace(' ', '-', $audio_file->getClientOriginalName()));
        $record->notes = $request->notes;

        // save the record
        $record->save();

        // attach tags to the record
        $record->tags()->attach($tags);

        // Do we want to go here or to the dashboard?
        return redirect()->route('detail', ['id' => $record->id]);

    }

    public function show() {
        $id = request('id');
        $record = Record::findOrFail($id);
        return view("detail", ['record' => $record]);
    }
}
