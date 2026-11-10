<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="/books" class="text-blue-500 hover:underline">Back to Books List</a>
                    <h3 class="text-lg font-medium text-gray-900">Book Details</h3>
                    <p class="mt-1 text-sm text-gray-500">Here are the details of the selected book.</p>

                    <div class="mt-4">
                        <h4 class="text-md font-medium text-gray-900">{{ $book->title }}</h4>
                        <p class="mt-1 text-sm text-gray-500">ISBN: {{ $book->isbn }}</p>
                        <p class="mt-1 text-sm text-gray-500">Publication Year: {{ $book->publication_year ?? 'N/A' }}</p>
                        <p class="mt-1 text-sm text-gray-500">Available Stock: {{ $book->stock }}</p>
                        <a href="{{ route('books.edit', $book->id) }}" class="text-blue-500 hover:underline mt-2 inline-block">Edit Book</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="mt-2 inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>