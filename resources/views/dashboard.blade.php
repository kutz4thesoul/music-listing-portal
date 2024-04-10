<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Hello {{ substr(auth()->user()->name,0,strpos(auth()->user()->name," ")) }}!<p class="mt-3">Let's get some music sold!
                    <p>
                </div>

            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <div class="bg-gray-900">
                        <div class="mx-auto">
                            <div class="bg-gray-900 py-10">
                                <div class="px-4 sm:px-6 lg:px-8">
                                    <div class="sm:flex sm:items-center">
                                        <div class="sm:flex-auto w-full">
                                            <h1 class="text-base font-semibold leading-6 text-white">Listings</h1>
                                            <p class="mt-2 text-sm text-gray-300">A list of all the records you've submitted and their sales data.</p><p class="text-sm text-gray-500">Sales data is updated manually and may not reflect the current sales.</p>
                                        </div>
                                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                            <a href="{{ route('add-edit-record') }}" class="block rounded-md bg-indigo-500 px-3 py-2 text-center text-sm font-semibold text-white hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Add record</a>
                                        </div>
                                    </div>
                                    <div class="mt-8 flow-root">
                                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                                <table class="w-full divide-y divide-gray-700">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Song ID</th>
                                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Title</th>
                                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">BPM</th>
                                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Listing Date</th>
                                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Tag(s)</th>
                                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Service(s)</th>
                                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                                                <span class="sr-only">Edit</span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="divide-y divide-gray-800">
                                                        @foreach ($records as $record)
                                                            <tr>
                                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">{{ $record->UID }}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">{{ $record->title }}
                                                                    <p class="mt-3"><audio controls>
                                                                        <source src="{{ asset("records/$record->audio_file")}}" type="audio/mpeg">
                                                                    Your browser does not support the audio element.
                                                                    </audio></p>
                                                                </td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">{{ $record->bpm }}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">{{ $record->listing_date }}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300"><span class="bg-gray-400 text-black p-1 rounded-lg m-1"><a href="#">Sultry</a></span><span class="bg-gray-400 text-black p-1 rounded-lg m-1"><a href="#">Sexy</a></span><span class="bg-gray-400 text-black p-1 rounded-lg m-1"><a href="#">Bumpin</a></span></td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300"><span class="bg-gray-400 text-black p-1 rounded-lg m-1"><a href="https://audiojungle.net/" target="_blank">Audio Jungle</a></span><span class="bg-gray-400 text-black p-1 rounded-lg m-1"><a href="https://www.pond5.com" target="_blank">Pond5</a></span></td>
                                                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                                                    <a href="#" class="text-indigo-400 hover:text-indigo-300">Edit<span class="sr-only">, Lindsay Walton</span></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        <!-- More people... -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>