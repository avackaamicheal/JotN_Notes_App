<x-layout>
    <x-slot:heading>
        Join Team
    </x-slot:heading>

    <div class="w-full max-w-md mx-auto">
        <!-- Join Team Card -->
        <div class="bg-white rounded-lg shadow divide-y divide-gray-200">
            <!-- Card Header -->
            <div class="px-6 py-5 flex items-center">
                <svg class="h-6 w-6 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                <h2 class="text-lg font-semibold text-gray-900">Join Existing Team</h2>
            </div>

            <!-- Card Body -->
            <div class="px-6 py-5">
                <form method="POST" action="{{ route('teams.join.submit') }}" class="space-y-6">
                    @csrf

                    <!-- Invite Code Field -->
                    <div>
                        <label for="invite_code" class="block text-sm font-medium text-gray-700">Invite Code</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text"
                                   id="invite_code"
                                   name="invite_code"
                                   required
                                   class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('invite_code') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                                   placeholder="e.g. A1B2-C3D4"
                                   value="{{ old('invite_code') }}"
                                   autocomplete="off"
                                   autocapitalize="characters">
                            @error('invite_code')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            @enderror
                        </div>
                        @error('invite_code')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @else
                            <p class="mt-2 text-sm text-gray-500">
                                Get the invite code from your team admin or invitation email.
                            </p>
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Join Team
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Alternative Options -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Don't have an invite? <a href="{{ route('teams.create') }}" class="font-medium text-blue-600 hover:text-blue-500">Create your own team</a>
            </p>
        </div>
    </div>
</x-layout>
