<x-app-layout>
    <div class="mt-12 max-w-7xl mx-auto bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">

            <div class="bg-white dark:bg-gray-800  text-gray-900 dark:text-gray-100 p-8 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Add/Edit New Record</h2>

                <div class="flex justify-between text-center mb-10">
                    <label class="step0 basis-1/5 border-solid border-2 border-gray-600 p-4">Step One</label>
                    <label class="step1 basis-1/5 border-solid border-2 border-gray-600 p-4">Step Two</label>
                    <label class="step2 basis-1/5 border-solid border-2 border-gray-600 p-4">Step Three</label>
                    <label class="step3 basis-1/5 border-solid border-2 border-gray-600 p-4">Step Four</label>
                    <label class="step4 basis-1/5 border-solid border-2 border-gray-600 p-4">Step Five</label>
                </div>

                <form class="new-listing-form" method="POST" action="{{ isset(request()->id) ? route('update-record', ['id' => request()->id]) : route('save-record') }}" enctype="multipart/form-data">
                    @csrf
                    @if(isset(request()->id))
                        @method('PUT')
                    @endif
                    <div class="form-section">
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium mb-2">Title</label>
                            <input type="text" id="title" name="title" value="{{ (isset($record)) ? $record->title : '' }}" class="dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full @error('title') border-red-500 @enderror" required>
                            @error('title')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="bpm" class="block text-sm font-medium mb-2">BPM</label>
                            <input type="number" id="bpm" name="bpm" value="{{ (isset($record)) ? $record->bpm : '' }}" class="dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full @error('bpm') border-red-500 @enderror" required>
                            @error('bpm')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="listing_date" class="block text-sm font-medium mb-2">Listing Date</label>
                            <input type="date" id="listing_date" name="listing_date" value="{{ (isset($record)) ? $record->listing_date : '' }}" class="dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full @error('listing_date') border-red-500 @enderror" required>
                            @error('listing_date')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium mb-2">Price</label>
                            <input type="number" id="price" name="price" value="{{ (isset($record)) ? $record->price : '' }}" class="dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full @error('price') border-red-500 @enderror" required>
                            @error('price')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="UID" class="block text-sm font-medium mb-2">UID</label>
                            <input type="text" id="UID" name="UID" value="{{ (isset($record)) ? $record->UID : '' }}" class="dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full @error('UID') border-red-500 @enderror">
                            @error('UID')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="is_exclusive" class="block text-sm font-medium mb-2">Is Exclusive</label>
                            <input type="checkbox" id="is_exclusive" name="is_exclusive" class="form-checkbox h-5 w-5 text-indigo-600 dark:text-indigo-400" {{ (isset($record) && $record->is_exclusive === 1) ? 'checked' : '' }}>
                            <span class="ml-2">Exclusive Listing</span>

                        </div>

                        <!-- TODO: START HERE -->

                        <div class="mb-4">
                            @if (!isset($record) || (isset($record) && !isset($record->audio_file)))
                                <label for="audio_file" class="block text-sm font-medium mb-2">Audio File</label>
                                <input type="file" id="audio_file" name="audio_file" value="" class="dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full @error('audio_file') border-red-500 @enderror">
                            @else
                                <label class="block text-sm font-medium mb-2">Audio File</label>
                                <!-- You can customize the display of audio file here -->
                                <audio controls class="w-3/4 inline-block">
                                    <source src="{{ asset("records/$record->audio_file") }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                                @if(isset(request()->id))
                                    <div class="">
                                        <a href="{{ route('remove-file', ['id' => $record->id]) }}" class="text-red-600">Update Audio File</a>
                                    </div>
                                @endif
                            @endif
                        </div>



                        <div class="mb-4">
                            <label for="notes" class="block text-sm font-medium mb-2">Notes</label>
                            <textarea id="notes" name="notes" class="dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full">{{ (isset($record)) ? $record->notes : '' }}</textarea>
                        </div>
                    </div>
                    <div class="form-section">
                        <h2 class="text-xl">Mood</h2>
                        <div class="grid grid-cols-3 gap-4 dark:bg-gray-800 p-4">
                            @foreach ($tags as $tag)
                            <label class="flex items-center text-gray-700 dark:text-gray-400">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600 dark:text-indigo-400" name="tag_{{ $tag->id }}" @if (isset($record) && $record->tags->contains($tag->id))
                                checked
                                @endif
                                >
                                <span class="ml-2">{{ $tag->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-section">
                        <h2 class="text-xl">Instruments</h2>
                        <div class="grid grid-cols-3 gap-4 dark:bg-gray-800 p-4">
                            @foreach ($instruments as $instrument)
                            <label class="flex items-center text-gray-700 dark:text-gray-400">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600 dark:text-indigo-400" name="instrument_{{ $instrument->id }}" @if (isset($record) && $record->instruments->contains($instrument->id))
                                checked
                                @endif
                                >
                                <span class="ml-2">{{ $instrument->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-section">
                        <h2 class="text-xl">Libraries</h2>
                        <div class="grid grid-cols-3 gap-4 dark:bg-gray-800 p-4">
                            @foreach ($libraries as $library)
                            <label class="flex items-center text-gray-700 dark:text-gray-400">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600 dark:text-indigo-400" name="library_{{ $library->id }}" @if (isset($record) && $record->libraries->contains($library->id))
                                checked
                                @endif
                                >
                                <span class="ml-2">{{ $library->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-section">
                        <h2 class="text-xl">Eras</h2>
                        <div class="grid grid-cols-3 gap-4 dark:bg-gray-800 p-4">
                            @foreach ($eras as $era)
                            <label class="flex items-center text-gray-700 dark:text-gray-400">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600 dark:text-indigo-400" name="era_{{ $era->id }}" @if (isset($record) && $record->eras->contains($era->id))
                                checked
                                @endif
                                >
                                <span class="ml-2">{{ $era->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-navigation mb-4">
                        <button type="button" class="previous bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">&lt; Previous</button>
                        <button type="button" class="next bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">&gt; Next</button>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                    </div>
                </form>
                @if(isset(request()->id))
                    <a href="{{ route('delete-record', ['id' => $record->id]) }}" class="text-red-600">Delete Record</a>
                @endif
            </div>

        </div>
    </div>
    <script>
        // Handle file removal and replacement.


    </script>
</x-app-layout>