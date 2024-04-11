<div>
<h2 class="text-xl">Add Library</h2>
    <form wire:submit="store" class="bg-gray-800 p-6 rounded-lg" >
        @csrf

        <!-- Name Field -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
            <input wire:model="name" type="text" name="name" class="max-w-xl form-input mt-1 block dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full ">
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Slug Field -->
        <div class="mb-4">
            <label for="slug" class="block text-sm font-medium text-gray-300">Slug</label>
            <input wire:model="slug" type="text" name="slug" class="max-w-xl form-input mt-1 block dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full ">
            @error('slug')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>


        <!-- URL Field -->
        <div class="mb-4">
            <label for="url" class="block text-sm font-medium text-gray-300">Url</label>
            <input wire:model="url" type="text" name="url" class="max-w-xl form-input mt-1 block dark:bg-gray-700 dark:text-white border border-gray-600 rounded-md px-3 py-2 w-full ">
            <p class="text-gray-500 text-xs mt-1">Include http:// or https://</p>
            @error('url')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        @if(session()->has('message'))
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-green-500 text-xl mt-1 mb-4">{{ session('message') }}</p>
        @endif

        <!-- Submit Button -->
        <div class="mb-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save Library</button>
        </div>
    </form>
</div>
