<x-app>
    <div>
        <div class="mb-6">
            <div class="py-4">
                <div class="flex items-center justify-between">
                    <h4 class="text-lg font-bold text-gray-700">Books</h4>
                </div>

                <div class="py-2">
                    <div class="flex flex-col overflow-hidden">
                        @if ($books->count() < 1)
                            <div class="flex flex-col items-center justify-center">
                                <h4 class="mb-1 text-lg font-medium text-blue-900">No books have been uploaded!</h4>
                            </div>
                        @else
                            <div class="px-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                <div class="inline-block min-w-full overflow-hidden align-middle">
                                    <table class="min-w-full">
                                        <thead>
                                            <tr>
                                                <th class="px-4 py-4 text-sm font-medium text-center text-gray-600">
                                                    Name
                                                </th>
                                                <th class="px-4 py-4 text-sm font-medium text-center text-gray-600">
                                                    Publisher
                                                </th>
                                                <th class="px-4 py-4 text-sm font-medium text-center text-gray-600">
                                                    Authors
                                                </th>
                                                <th class="px-4 py-4 text-sm font-medium text-center text-gray-600">
                                                    Country
                                                </th>
                                                <th class="px-4 py-4 text-sm font-medium text-center text-gray-600">
                                                    Release Date
                                                </th>
                                                <th class="px-4 py-4 text-sm font-medium text-center text-gray-600">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($books as $book)
                                                <tr
                                                    class="bg-white border-b-8 border-gray-100 shadow last:border-b-0 sm:rounded-lg hover:bg-gray-100">
                                                    <td
                                                        class="px-4 py-4 text-sm font-medium text-center text-gray-600 whitespace-no-wrap">
                                                        {{ ucwords($book->name) }}
                                                    </td>
                                                    <td
                                                        class="px-4 py-4 text-sm font-medium text-center text-gray-600 whitespace-no-wrap">
                                                        {{ $book->publisher }}
                                                    </td>
                                                    <td
                                                        class="px-4 py-4 text-sm font-medium text-center text-gray-600 whitespace-no-wrap">
                                                        {{ implode(', ', $book->authors) }}
                                                    </td>
                                                    <td
                                                        class="px-4 py-4 text-sm font-medium text-center text-gray-600 whitespace-no-wrap">
                                                        {{ $book->country }}
                                                    </td>
                                                    <td
                                                        class="px-4 py-4 text-sm font-medium text-center text-gray-600 whitespace-no-wrap">
                                                        {{ date('d M Y', strtotime($book->release_date)) }}
                                                    </td>
                                                    <td
                                                        class="px-4 py-4 text-sm font-medium text-center text-gray-600 whitespace-no-wrap">
                                                        <a href="{{ route('edit-book', $book) }}"
                                                            class="text-blue-400 hover:text-blue-500 hover:underline">Edit</a>
                                                    </td>
                                                    <td
                                                        class="px-4 py-4 text-sm font-medium text-center text-gray-600 whitespace-no-wrap">
                                                        <a href="#" @click.prevent="deleteBook({{ $book->id }})"
                                                            class="text-blue-400 hover:text-blue-500 hover:underline"
                                                            :disabled="loading">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>
