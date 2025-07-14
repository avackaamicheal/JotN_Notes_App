<x-layout>
    <x-slot:heading>
        Join a Team
    </x-slot:heading>

        <div class="w-full max-w-md">
            <!-- Join Team Card -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center mb-6">
                    <i class="fab fa-microsoft text-blue-500 text-xl mr-3"></i>
                    <h2 class="text-lg font-semibold text-gray-800">Join Existing Team</h2>
                </div>

                <form class="space-y-6" method="POST" action="{{ route('teams.join.submit') }}">
                    @csrf
                    <!-- Invite Code Field -->
                    <div>
                        <label for="invite-code" class="block text-sm font-medium text-gray-700 mb-1">Invite Code</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input
                                type="text"
                                id="invite_code"
                                name="invite_code"
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter your team invite code">
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                            Get the invite code from your team admin or invitation email.
                        </p>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end space-x-3 pt-2">
                        <a href="#" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md text-sm font-medium transition-colors">
                            Cancel
                        </a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                            <i class="fas fa-sign-in-alt mr-2"></i>Join Team
                        </button>
                    </div>
                </form>
            </div>
        </div>

</x-layout>
