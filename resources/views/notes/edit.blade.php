<<x-layout>
    <x-slot:heading>
        Edit Note - {{ Str::title($team->name) }}
    </x-slot:heading>

    <div class="w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <!-- Edit Note Card -->
        <div class="bg-white rounded-lg shadow divide-y divide-gray-200">
            <!-- Card Header -->
            <div class="px-6 py-5 flex items-center">
                <svg class="h-6 w-6 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                <h2 class="text-lg font-semibold text-gray-900">Edit Note</h2>
            </div>

            <!-- Card Body -->
            <div class="px-6 py-5">
                <form method="POST" action="{{ route('teams.notes.update', [$team, $note]) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Note Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <div class="mt-1">
                            <input type="text" id="title" name="title" required
                                   class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                                   value="{{ old('title', $note->title) }}">
                            @error('title')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Note Content -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                        <div class="mt-1">
                            <textarea id="content" name="content" rows="12" required
                                      class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('content') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                                      placeholder="Write your note content here...">{{ old('content', $note->content) }}</textarea>
                            @error('content')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                            Supports <a href="https://www.markdownguide.org/cheat-sheet/" target="_blank" class="text-blue-600 hover:text-blue-500">Markdown formatting</a>
                        </p>
                    </div>

                    <!-- Pinned Option -->
                    <div class="flex items-center">
                        <input id="is_pinned" name="is_pinned" type="checkbox"
                               class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded"
                               {{ old('is_pinned', $note->is_pinned) ? 'checked' : '' }}>
                        <label for="is_pinned" class="ml-2 block text-sm text-gray-700">
                            Pin this note to the top of the team's notes list
                        </label>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end space-x-3 pt-4">
                        <a href="{{ route('teams.notes.show', [$team, $note]) }}"
                           class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Update Note
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Initialize a Markdown editor here if desired
        // Example using EasyMDE:
        // const easyMDE = new EasyMDE({ element: document.getElementById('content') });
    </script>
    @endpush
</x-layout>
