<x-layout>
    <x-slot:heading>
        Create Note - {{ $team->name }}
    </x-slot:heading>

    <div class="w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <!-- Create Note Card -->
        <div class="bg-white rounded-lg shadow divide-y divide-gray-200">
            <!-- Card Header -->
            <div class="px-6 py-5 flex items-center">
                <svg class="h-6 w-6 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h2 class="text-lg font-semibold text-gray-900">Create New Note</h2>
            </div>

            <!-- Card Body -->
            <div class="px-6 py-5">
                <form method="POST" action="{{ route('teams.notes.store', $team) }}" class="space-y-6">
                    @csrf

                    <!-- Note Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <div class="mt-1">
                            <input type="text" id="title" name="title" required
                                   class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                                   placeholder="Meeting notes - January 2023"
                                   value="{{ old('title') }}">
                            @error('title')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Note Content -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                        <div class="mt-1">
                            <textarea id="content" name="content" rows="12"
                                      class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('content') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                                      placeholder="Write your note content here... Markdown is supported">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                            Supports <a href="https://www.markdownguide.org/cheat-sheet/" target="_blank" class="text-blue-600 hover:text-blue-500">Markdown formatting</a>
                        </p>
                    </div>

                    <!-- Privacy Settings -->
                    <fieldset>
                        <legend class="text-sm font-medium text-gray-700">Visibility</legend>
                        <div class="mt-2 space-y-3">
                            <div class="flex items-center">
                                <input id="team-visible" name="visibility" type="radio" value="team"
                                       class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300"
                                       checked>
                                <label for="team-visible" class="ml-2 block text-sm text-gray-700">
                                    <span class="font-medium">Team Members Only</span>
                                    <p class="text-xs text-gray-500">Visible to all {{ $team->name }} team members</p>
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="company-visible" name="visibility" type="radio" value="company"
                                       class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                <label for="company-visible" class="ml-2 block text-sm text-gray-700">
                                    <span class="font-medium">Entire Company</span>
                                    <p class="text-xs text-gray-500">Visible to all company members</p>
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <!-- Pinned Option -->
                    <div class="flex items-center">
                        <input id="is_pinned" name="is_pinned" type="checkbox"
                               class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                        <label for="is_pinned" class="ml-2 block text-sm text-gray-700">
                            Pin this note to the top of the team's notes list
                        </label>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end space-x-3 pt-4">
                        <a href="{{ route('teams.notes.index', $team) }}"
                           class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Create Note
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Simple Markdown preview toggle
        document.addEventListener('DOMContentLoaded', function() {
            // You could add a Markdown preview toggle here
            // or integrate with a more advanced editor like Tiptap or EasyMDE
        });
    </script>
    @endpush
</x-layout>
