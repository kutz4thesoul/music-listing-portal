<x-app-layout>
    <div class="mt-12 max-w-7xl mx-auto bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
        <div
            class="bg-white text-gray-900 dark:text-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">



            <div class="p-8 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Record Details</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">UID</label>
                        <p class="text-lg">{{ $record->UID }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Service</label>
                        <p class="text-lg">Audio Jungle</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Title</label>
                        <p class="text-lg">{{ $record->title }}</p>
                    </div>
                    <div class="mb-4 col-span-2">
                        <label class="block text-sm font-medium mb-2">Audio File</label>
                        <!-- You can customize the display of audio file here -->
                        <audio controls class="w-full">
                            <source src="{{ asset("records/$record->audio_file") }}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">BPM</label>
                        <p class="text-lg">{{ $record->bpm }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Listing Date</label>
                        <p class="text-lg">{{ $record->listing_date }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Price</label>
                        <p class="text-lg">${{ $record->price }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Is Exclusive</label>
                        <p class="text-lg">{{ $record->is_exclusive ? 'Yes' : 'No' }}</p>
                    </div>
                    <div class="mb-4 col-span-2">
                        <label class="block text-sm font-medium mb-2">Notes</label>
                        <p class="text-lg">{{ $record->notes }}</p>
                    </div>
                </div>
                <div class="mt-4">
                  <a href="{{ route('edit-record',['id' => $record->id]) }}" class="next bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Record</a>
              </div>
            </div>


            


        </div>
    </div>


    <div
        class="mt-12 max-w-7xl mx-auto bg-white dark:bg-gray-800 text-gray-900 dark:text-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Additional Details</h2>
        <div class="container mx-auto py-8">
            <!-- Tabs -->
            <div class="flex">
                <!-- Tab 1 -->
                <input type="radio" id="tab1" name="tab" class="hidden">
                <label for="tab1" class="cursor-pointer px-4 py-2 rounded-t-lg "
                    tabindex="0">Mood</label>
                <!-- Tab 2 -->
                <input type="radio" id="tab2" name="tab" class="hidden">
                <label for="tab2" class="cursor-pointer px-4 py-2 rounded-t-lg dark:border-gray-800 border"
                    tabindex="0">Instruments</label>
                <!-- Tab 3 -->
                <input type="radio" id="tab3" name="tab" class="hidden">
                <label for="tab3"
                    class="cursor-pointer px-4 py-2 rounded-t-lg dark:border-gray-800 border"
                    tabindex="0">Libraries</label>
                    <!-- Tab 4 -->
                <input type="radio" id="tab4" name="tab" class="hidden">
                <label for="tab4"
                    class="cursor-pointer px-4 py-2 rounded-t-lg dark:border-gray-800 border"
                    tabindex="0">Eras</label>
            </div>
            <!-- Tab Content -->
            <div class="tab-content p-4 bg-gray-200 dark:bg-gray-600 rounded-r-lg rounded-bl-lg">
                <!-- Content for Tab 1 -->
                <div class="tab-content-item" id="tab1-content" role="tabpanel" aria-labelledby="tab1">
                  <div class="flex-wrap px-3 py-4 text-sm text-gray-900 dark:text-gray-100 align-top flex">
                    @foreach ($record->tags as $tag)
                    <div class="bg-gray-600 dark:bg-gray-400 text-white dark:text-black p-1 rounded-lg m-1"><a href="{{ route('moods',['slug' => $tag->slug]) }}">{{ ucwords($tag->name) }}</a></div>
                    @endforeach
                </div>
                </div>
                <!-- Content for Tab 2 -->
                <div class="tab-content-item hidden" id="tab2-content" role="tabpanel" aria-labelledby="tab2">
                  <div class="whitespace-nowrap px-3 py-4 text-sm text-gray-900 dark:text-gray-100 align-top flex">
                    @foreach ($record->instruments as $instrument)
                    <div class="bg-gray-600 dark:bg-gray-400 text-white dark:text-black p-1 rounded-lg m-1"><a href="{{ route('instruments',['slug' => $instrument->slug]) }}" target="_blank">{{ ucwords($instrument->name) }}</a></div>
                    @endforeach
                </div>
                </div>
                <!-- Content for Tab 3 -->
                <div class="tab-content-item hidden" id="tab3-content" role="tabpanel" aria-labelledby="tab3">
                  <div class="whitespace-nowrap px-3 py-4 text-sm text-gray-900 dark:text-gray-100 align-top flex">
                    @foreach ($record->libraries as $library)
                    <div class="bg-gray-600 dark:bg-gray-400 text-white dark:text-black p-1 rounded-lg m-1"><a href="{{ route('libraries',['slug' => $library->slug]) }}" target="_blank">{{ ucwords($library->name) }}</a></div>
                    @endforeach
                </div>
                </div>
                <!-- Content for Tab 4 -->
                <div class="tab-content-item hidden" id="tab4-content" role="tabpanel" aria-labelledby="tab4">
                  <div class="whitespace-nowrap px-3 py-4 text-sm text-gray-900 dark:text-gray-100 align-top flex">
                    @foreach ($record->eras as $era)
                    <div class="bg-gray-600 dark:bg-gray-400 text-white dark:text-black p-1 rounded-lg m-1"><a href="{{ route('eras',['slug' => $era->slug]) }}" target="_blank">{{ ucwords($era->name) }}</a></div>
                    @endforeach
                </div>
              </div>
            </div>
        </div>
    </div>
</x-app-layout>
