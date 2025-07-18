<x-layout>
    <x-slot:heading>
        Create Team
    </x-slot:heading>

    <div class="w-full max-w-2xl mx-auto">
        <!-- Create Team Card -->
        <div class="bg-white rounded-lg shadow divide-y divide-gray-200">
            <!-- Card Header -->
            <div class="px-6 py-5 flex items-center">
                <svg class="h-6 w-6 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <h2 class="text-lg font-semibold text-gray-900">Create New Team</h2>
            </div>

            <!-- Card Body -->
            <div class="px-6 py-5">
                <form method="POST" action="{{ route('teams.store') }}" class="space-y-6">
                    @csrf

                    <!-- Team Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Team name</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" id="name" name="name" required
                                   class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                                   placeholder="Marketing Team"
                                   value="{{ old('name') }}">
                            @error('name')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            @enderror
                        </div>
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Team Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description (optional)</label>
                        <div class="mt-1">
                            <textarea id="description" name="description" rows="3"
                                      class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                                      placeholder="What's this team about?">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end space-x-3 pt-2">
                        <a href="{{ route('teams.index') }}"
                           class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Create Team
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
