<x-layout>
    <x-slot:heading>
        Team notes
    </x-slot:heading>

{{-- <div class="max-w-4xl mx-auto py-8"> --}}
    {{-- Create Note Button --}}
{{-- <div class="mb-6">
    <a href="{{ route('teams.notes.create', ['team' => $team->id]) }}"
       class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
        + Create New Note
    </a>
</div> --}}

    {{-- <h2 class="text-2xl font-bold mb-4">{{ $team->name }}</h2>
    <p class="text-gray-600 mb-6">{{ $team->description }}</p> --}}

    {{-- Invite Code --}}
    {{-- <div class="mb-6">
        <label class="text-sm font-medium text-gray-700">Invite Code:</label>
        <div class="bg-gray-100 rounded px-3 py-2 inline-block font-mono text-gray-800">
            {{ $team->invite_code }}
        </div>
    </div> --}}

    {{-- Team Notes --}}
    {{-- <div class="mt-8">
        <h3 class="text-xl font-semibold mb-4">Notes</h3>

        @forelse ($notes as $note)
            <div class="bg-white shadow-md rounded p-4 mb-4 border">
                <h4 class="text-lg font-bold text-gray-800">{{ $note->title }}</h4>
                <p class="text-gray-600 text-sm mb-2">By: {{ $note->user->name }}</p>
                <p class="text-gray-700">{{ Str::limit($note->content, 150) }}</p>
            </div>
        @empty
            <p class="text-gray-500 italic">No notes available for this team.</p>
        @endforelse
    </div>

</div> --}}

<!-- Main Content -->
    <main class="flex-grow container mx-auto p-6">
        <div class="w-full max-w-6xl mx-auto">
            <!-- Team Notes Header -->
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center">
                    <i class="fab fa-microsoft text-blue-500 text-xl mr-3"></i>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">{{ $team->name }}</h2>
                        <div>
                            <p class="text-xs text-gray-400">Invite Code:</p>
                            <div class="bg-green-100 text-green-800 px-3 py-1 rounded text-sm font-mono">
                                {{ $team->invite_code }}
                            </div>
                        </div>
                        <p class="text-sm text-gray-500">12 notes • Last updated today</p>
                    </div>
                </div>
                <a href="{{ route('teams.notes.create', ['team' => $team->id]) }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                    <i class="fas fa-plus mr-2"></i>Create New Note
                </a>
            </div>

            <!-- Notes Filter/Search -->
            <div class="bg-white rounded-lg shadow p-4 mb-6">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="relative flex-grow">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input
                            type="text"
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search notes...">
                    </div>
                    <div class="flex space-x-2">
                        <select class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 rounded-md">
                            <option>All Notes</option>
                            <option>Recent</option>
                            <option>Most Viewed</option>
                        </select>
                        <button class="bg-gray-100 hover:bg-gray-200 text-gray-800 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                            <i class="fas fa-filter"></i>
                        </button>
                    </div>
                </div>
            </div>

                        <!-- Notes Grid -->
            <div class="grid grid-cols-3 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Note Card 1 -->
                @forelse ($notes as $note)
                    <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-md transition-shadow">
                        <a href="{{ route('teams.notes.show', [$team->id, $note->id]) }}">
                            <div class="p-4 border-b border-gray-200">
                                <div class="flex justify-between items-start">
                                    <h3 class="text-lg font-medium text-gray-900 truncate">{{ $note->title }}</h3>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="text-sm text-gray-600 line-clamp-3">
                                    {{ Str::limit($note->content, 150) }}
                                </div>
                                <div class="mt-4 flex items-center text-sm text-gray-500">
                                    <i class="fas fa-user-edit mr-1.5"></i> {{ $note->author->name }} • {{ $note->created_at->format('F j, Y') }}
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 flex justify-between items-center border-t border-gray-200">
                                <span class="text-xs text-gray-500">
                                    <i class="fas fa-users mr-1"></i> 12 members
                                </span>
                                <a href="{{ route('teams.notes.show', [$team->id, $note->id]) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    View <i class="fas fa-chevron-right ml-1"></i>
                                </a>
                            </div>
                        </a>
                    </div>
                @empty
                    <p class="text-gray-500 italic">No notes available for this team.</p>
                @endforelse
            </div>
        </div>
    </main>
</x-layout>
