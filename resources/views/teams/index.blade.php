<x-layout>
    <x-slot:heading>
        Dashboard
    </x-slot:heading>

    <div class="w-full max-w-2xl space-y-6">
            <!-- Card 1 -->
            <div class="flex space-x-2 justify-between">
                        <a href="{{ route('teams.join') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                            <i class="fas fa-user-plus mr-2"></i>Join a Team
                        </a>
                        <a href="{{ route('teams.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                            <i class="fas fa-plus mr-2"></i>Create a Team
                        </a>
                </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items- pb-3">
                    <i class="bi bi-people-fill text-blue-500 text-xl mr-3"></i>
                    <h2 class="text-lg font-semibold text-green-600">Owned Teams</h2>
                </div>
                @foreach ($ownedTeams as $team)
                    <div class="bg-white shadow rounded-lg p-4 mb-4 border border-green-200 hover:border-blue-400">
                        <a href="{{ route('teams.notes.index', $team->id) }}">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="font-semibold text-gray-600 mt-4">{{ $team->name }}</h3>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs text-gray-400">Invite Code:</p>
                                    <div class="bg-green-100 text-green-800 px-3 py-1 rounded text-sm font-mono">
                                        {{ $team->invite_code }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center pb-3">
                    <i class="bi bi-people-fill text-blue-500 text-xl mr-3"></i>
                    <h2 class="text-lg font-semibold text-blue-600">Join Teams</h2>
                </div>
                @foreach ($joinedTeams as $team)
                    <div class="bg-white shadow rounded-lg p-4 mb-4 border border-green-200 hover:border-green-600">
                        <a href="{{ route('teams.notes.index', $team->id) }}">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="font-semibold text-gray-600 mt-4">{{ $team->name }}</h3>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs text-gray-400">Invite Code:</p>
                                    <div class="bg-green-100 text-green-800 px-3 py-1 rounded text-sm font-mono">
                                        {{ $team->invite_code }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
</x-layout>
