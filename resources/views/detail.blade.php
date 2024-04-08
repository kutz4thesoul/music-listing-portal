<x-app-layout>
    <div class="mt-12 max-w-7xl mx-auto bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
        <div class="bg-white text-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">



    <div class="p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Record Details</h2>
        <div class="grid grid-cols-2 gap-4">
          <div class="mb-4">
            <label class="block text-sm font-medium mb-2">UID</label>
            <p class="text-lg">{{ $item->UID }}</p>
          </div>
          <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Service</label>
            <p class="text-lg">Audio Jungle</p>
          </div>
          <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Title</label>
            <p class="text-lg">{{ $item->title }}</p>
          </div>
          <div class="mb-4 col-span-2">
            <label class="block text-sm font-medium mb-2">Audio File</label>
            <!-- You can customize the display of audio file here -->
            <audio controls class="w-full">
              <source src="{{ $item->audio_file }}" type="audio/mpeg">
              Your browser does not support the audio element.
            </audio>
          </div>
          <div class="mb-4">
            <label class="block text-sm font-medium mb-2">BPM</label>
            <p class="text-lg">{{ $item->bpm }}</p>
          </div>
          <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Listing Date</label>
            <p class="text-lg">{{ $item->listing_date }}</p>
          </div>
          <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Price</label>
            <p class="text-lg">${{ $item->price }}</p>
          </div>
          <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Is Exclusive</label>
            <p class="text-lg">{{ $item->is_exclusive ? 'Yes' : 'No' }}</p>
          </div>
          <div class="mb-4 col-span-2">
            <label class="block text-sm font-medium mb-2">Notes</label>
            <p class="text-lg">{{ $item->notes }}</p>
          </div>
        </div>
      </div>
      


    </div>
    </div>
</x-app-layout>