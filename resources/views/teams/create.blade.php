<x-layout>
    <x-slot:heading>
        Create a team
    </x-slot:heading>



    <div class="w-full max-w-2xl">
            <!-- Create Team Card -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center mb-6">
                    <i class="fab fa-microsoft text-blue-500 text-xl mr-3"></i>
                    <h2 class="text-lg font-semibold text-gray-800">Create New Team</h2>
                </div>

                <form class="space-y-4" method="POST" action="{{ route('teams.store') }}">
                    @csrf
                    <!-- Team Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Team Name</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter team name">
                    </div>

                    <!-- Team Description Field -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea
                            id="description"
                            name="description"
                            rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="What's this team about?"></textarea>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end space-x-3 pt-4">
                        <a href="#" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md text-sm font-medium transition-colors">
                            Cancel
                        </a>
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                            <i class="fas fa-plus mr-2"></i>Create Team
                        </button>
                    </div>
                </form>
            </div>
        </div>
</x-layout>

