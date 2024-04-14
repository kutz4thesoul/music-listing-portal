<?php

namespace App\Http\Controllers;

use App\Models\Era;
use App\Models\Tag;
use App\Models\Record;
use App\Models\Library;
use App\Models\Instrument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecordController extends Controller
{
    public function store(Request $request, $id = null) {

        $tags        = [];
        $libraries   = [];
        $instruments = [];
        $eras        = [];

        // Extract tag ID's from the request
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'tag_') === 0) {
                $tags[] = substr($key, 4);
            }
        }

        // Extract library ID's from the request
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'library_') === 0) {
                $libraries[] = substr($key, 8);
            }
        }

        // Extract instrument ID's from the request
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'instrument_') === 0) {
                $instruments[] = substr($key, 11);
            }
        }

        // Extract era ID's from the request
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'era_') === 0) {
                $eras[] = substr($key, 4);
            }
        }

        
        // TODO: Do I need to do this since I'm using parsley.js to validate the step form?
        // validate form fields
        $request->validate([
            'title' => 'required',
            'bpm' => 'required|numeric',
            'listing_date' => 'required|date',
            'price' => 'required|numeric',
            'audio_file' => 'required|file|mimes:mp3'
        ]);

        // create or update the record
        if ($id) {
            $record = Record::findOrFail($id);
            $record->tags()->detach();
            $record->libraries()->detach();
            $record->instruments()->detach();
            $record->eras()->detach();
        } else {
            $record = new Record();
        }
        $audio_file = $request->file('audio_file');
        $record->title = $request->title;
        $record->bpm = $request->bpm;
        $record->listing_date = $request->listing_date;
        $record->price = $request->price;
        $record->UID = $request->UID;
        $record->is_exclusive = ( 'on' == $request->is_exclusive ) ? 1 : 0;
        $record->audio_file = strtolower(str_replace(' ', '-', $audio_file->getClientOriginalName()));
        $record->notes = $request->notes;

        // TODO: What to do when the filename is the same as an existing file?
        // store audio file
        if ($audio_file->isValid()) {
            $audio_file->storeAs('records', strtolower(str_replace(' ', '-', $audio_file->getClientOriginalName())));
        }

        // save the record
        $record->save();

        // attach tags and libraries to the record
        $record->tags()->attach($tags);

        // attach libraries to the record
        $record->libraries()->attach($libraries);

        // attach instruments to the record
        $record->instruments()->attach($instruments);

        // attach eras to the record
        $record->eras()->attach($eras);

        // TODO: Do we want to go here or to the dashboard?
        return redirect()->route('detail', ['id' => $record->id]);

    }

    public function showbyId() {
        $id = request('id');
        $record = Record::with('tags', 'libraries', 'instruments', 'eras')->findOrFail($id);
        return view("detail", ['record' => $record]);
    }

    public function addEditRecord($id = null) {

        if ($id) {
            $record = Record::with('tags', 'libraries', 'instruments', 'eras')->findOrFail($id);
            return view('add-edit-record', ['record' => $record, 'tags' => Tag::all(), 'libraries' => Library::all(), 'instruments' => Instrument::all(), 'eras' => Era::all()]);
        } else {
            return view('add-edit-record', ['tags' => Tag::all(), 'libraries' => Library::all(), 'instruments' => Instrument::all(), 'eras' => Era::all()]);
        }
    }

    public function destroy($id) {
        $record = Record::findOrFail($id);
        $record->delete();

        // delete the audio file
        Storage::delete('records/' . $record->audio_file);
        return redirect()->route('dashboard');
    }
}
