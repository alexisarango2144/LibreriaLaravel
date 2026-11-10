<x-app-layout>
    <x-slot name="title">
        Libros
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Libros
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Lista de Libros</h3>
                    <p class="mt-1 text-sm text-gray-500">Aquí tienes la lista de todos los libros disponibles.</p>
                    <a href="/books/create" class="text-blue-500 hover:underline">Nuevo Libro</a>
                </div>
            </div>

            @foreach ($books as $book)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h4 class="text-md font-medium text-gray-900"><a href="{{ route('books.show', $book->id) }}" class="text-blue-500 hover:underline">{{ $book->title }}</a></h4>
                        <p class="mt-1 text-sm text-gray-500">ISBN: {{ $book->isbn }}</p>
                        <p class="mt-1 text-sm text-gray-500">Año de publicación: {{ $book->publication_year ?? 'N/A' }}</p>
                        <p class="mt-1 text-sm text-gray-500">Stock disponible: {{ $book->stock }}</p>
                    </div>
                </div>
            @endforeach

            {{ $books->links() }}
        </div>
    </div>
</x-app-layout>