<x-layout>
{{-- <div>
    <h2>Create Note for {{ $team->name }}</h2>

    <form method="POST" action="{{ route('teams.notes.store', $team) }}">
        @csrf
        <input name="title" placeholder="Title" required>
        <textarea name="content" placeholder="Content" required></textarea>
        <button type="submit">Save</button>
    </form>

</div> --}}

<x-slot:heading>
    Create Note
</x-slot:heading>

<!-- Main Content -->
    <main class="flex-grow container mx-auto p-6 flex items-center justify-center">
        <div class="w-full max-w-4xl">
            <!-- Create Note Card -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center mb-6">
                    <i class="fab fa-microsoft text-blue-500 text-xl mr-3"></i>
                    <h2 class="text-lg font-semibold text-gray-800">Create New Team Note</h2>
                </div>

                <form class="space-y-6" method="POST" action="{{ route('teams.notes.store', ['team' => $team->id]) }}">
                    @csrf

                    <!-- Note Title -->
                    <div>
                        <label for="note-title" class="block text-sm font-medium text-gray-700 mb-1">Note Title</label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter note title">
                    </div>

                    <!-- Note Content -->
                    <div>
                        <label for="note-content" class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                        <textarea
                            id="content"
                            name="content"
                            rows="10"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 prose max-w-none"
                            placeholder="Write your note content here... Markdown is supported"></textarea>
                    </div>

                    <!-- Privacy Settings -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Visibility</label>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input id="team-visible" name="visibility" type="radio" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300" checked>
                                <label for="team-visible" class="ml-2 block text-sm text-gray-700">Team Members Only</label>
                            </div>
                            <div class="flex items-center">
                                <input id="company-visible" name="visibility" type="radio" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                <label for="company-visible" class="ml-2 block text-sm text-gray-700">Visible to Entire Company</label>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end space-x-3 pt-4">
                        <a href="#" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md text-sm font-medium transition-colors">
                            Cancel
                        </a>
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                            <i class="fas fa-plus mr-2"></i>Create Note
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layout>
