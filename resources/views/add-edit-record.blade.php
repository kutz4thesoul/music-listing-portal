<x-app-layout>
    <div class="mt-12 max-w-7xl mx-auto bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">

            <div class="bg-gray-800 text-white p-8 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Add/Edit New Record</h2>

                <div class="flex justify-between text-center mb-10">
                    <label class="step0 basis-1/2 border-solid border-2 border-gray-600 p-4">Step One</label>
                    <label class="step1 basis-1/2 border-solid border-2 border-gray-600 p-4">Step Two</label>
                </div>

                <form class="new-listing-form" method="POST" action="{{ route('save-record') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-section">
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium mb-2">Title</label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}" class="dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full @error('title') border-red-500 @enderror" required>
                            @error('title')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="bpm" class="block text-sm font-medium mb-2">BPM</label>
                            <input type="number" id="bpm" name="bpm" value="{{ old('bpm') }}" class="dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full @error('bpm') border-red-500 @enderror" required>
                            @error('bpm')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="listing_date" class="block text-sm font-medium mb-2">Listing Date</label>
                            <input type="date" id="listing_date" name="listing_date" value="{{ old('listing_date') }}" class="dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full @error('listing_date') border-red-500 @enderror" required>
                            @error('listing_date')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium mb-2">Price</label>
                            <input type="number" id="price" name="price" value="{{ old('price') }}" class="dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full @error('price') border-red-500 @enderror" required>
                            @error('price')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="UID" class="block text-sm font-medium mb-2">UID</label>
                            <input type="text" id="UID" name="UID" value="{{ old('UID') }}" class="dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full @error('UID') border-red-500 @enderror">
                            @error('UID')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="is_exclusive" class="block text-sm font-medium mb-2">Is Exclusive</label>
                            <input type="checkbox" id="is_exclusive" name="is_exclusive" class="form-checkbox h-5 w-5 text-indigo-600 dark:text-indigo-400">
                            <span class="ml-2">Exclusive Listing</span>

                        </div>
                        <div class="mb-4">
                            <label for="audio_file" class="block text-sm font-medium mb-2">Audio File</label>
                            <input type="file" id="audio_file" name="audio_file" value="{{ old('audio_file') }}" class="dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full @error('audio_file') border-red-500 @enderror" required>
                            @error('audio_file')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="notes" class="block text-sm font-medium mb-2">Notes</label>
                            <textarea id="notes" name="notes" class="dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full">{{ old('notes') }}</textarea>
                        </div>
                    </div>
                    <div class="form-section">
                    <h2 class="text-xl">Mood</h2>
                        <div class="grid grid-cols-3 gap-4 dark:bg-gray-800 p-4">
                            @php
                            $items = explode(',', 'achievement,angry,anxious,aggressive,big,bouncy,bright,calm,casual,every day,chaotic,cheerful/happy,confident,confused,contemplative,cool,dark,determined,down,melancholic,discovery,disturbing,dramatic,dreamy,driving,easy,eerie,elegant,energetic,epic,erotic,ethereal,evil,festive,frantic,fun,funny,funky,futuristic,groovy,happy,hard,haunting,heavy,high tech,hopeful,hypnotic,industrial,inspirational,motivational,intense,joyful,light,lively,magical,mechanical,meditative,melancholy,mellow,mournful,mystical,nature,ominous,foreboding,optimistic,passionate,patriotic,peaceful,playful,poignant,pompous,powerful,positive,proud,quiet,reflective,regal,relaxed,repetitive,romantic,sad,scary,searching,sensual,sentimental,serene,sexy,sultry,sincere,smooth,soft,soothing,southern,strange,suspense,sweet,tension,terror,tranquil,travel,uplifting,urban,video game,wholesome');
                            @endphp

                            @foreach ($tags as $tag)
                            <label class="flex items-center text-gray-700 dark:text-gray-400">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600 dark:text-indigo-400" name="tag_{{ $tag->id }}">
                                <span class="ml-2">{{ $tag->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-navigation">
                        <button type="button" class="previous bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">&lt; Previous</button>
                        <button type="button" class="next bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">&gt; Next</button>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                    </div>
                </form>
            </div>

        </div>


    </div>
</x-app-layout>