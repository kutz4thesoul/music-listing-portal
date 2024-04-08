<x-app-layout>
    <div class="mt-12 max-w-7xl mx-auto bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">

            <div class="bg-gray-800 text-white p-8 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Add/Edit New Record</h2>
                <form method="POST" action="{{ route('dashboard') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium mb-2">Title</label>
                        <input type="text" id="title" name="title"
                            class="dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full @error('title') border-red-500 @enderror">
                        @error('title')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="bpm" class="block text-sm font-medium mb-2">BPM</label>
                        <input type="number" id="bpm" name="bpm"
                            class="dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full @error('bpm') border-red-500 @enderror">
                        @error('bpm')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="listing_date" class="block text-sm font-medium mb-2">Listing Date</label>
                        <input type="date" id="listing_date" name="listing_date"
                            class="dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full @error('listing_date') border-red-500 @enderror">
                        @error('listing_date')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="price" class="block text-sm font-medium mb-2">Price</label>
                        <input type="number" id="price" name="price"
                            class="dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full @error('price') border-red-500 @enderror">
                        @error('price')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="UID" class="block text-sm font-medium mb-2">UID</label>
                        <input type="text" id="UID" name="UID"
                            class="dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full @error('UID') border-red-500 @enderror">
                        @error('UID')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="is_exclusive" class="block text-sm font-medium mb-2">Is Exclusive</label>
                        <input type="checkbox" id="is_exclusive" name="is_exclusive"
                            class="form-checkbox dark:bg-gray-700 dark:text-white h-5 w-5 text-gray-600"><span
                            class="ml-2">Exclusive Listing</span>
                    </div>
                    <div class="mb-4">
                        <label for="audio_file" class="block text-sm font-medium mb-2">Audio File</label>
                        <input type="file" id="audio_file" name="audio_file"
                            class="dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full @error('audio_file') border-red-500 @enderror">
                        @error('audio_file')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="notes" class="block text-sm font-medium mb-2">Notes</label>
                        <textarea id="notes" name="notes"
                            class="dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full"></textarea>
                    </div>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                </form>
            </div>
    
        </div>
    
        
    </div>
</x-app-layout>
