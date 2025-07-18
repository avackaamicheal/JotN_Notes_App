<x-layout>
    <x-slot:heading>
        Team Notes: {{ Str::title($team->name) }}
    </x-slot:heading>

    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Team Header -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <div class="h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center">
                            <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">{{ Str::title($team->name) }}</h1>
                        <div class="mt-1 flex flex-wrap items-center gap-2">
                            <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-blue-400" fill="currentColor" viewBox="0 0 8 8">
                                    <circle cx="4" cy="4" r="3" />
                                </svg>
                                {{ $team->users->count() }} members
                            </div>
                            <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Invite Code: {{ $team->invite_code }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-shrink-0">
                    <a href="{{ route('teams.notes.create', $team) }}"
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        New Note
                    </a>
                </div>
            </div>
        </div>

        <!-- Search and Filter -->
        <div class="bg-white rounded-lg shadow p-4 mb-6">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="relative flex-grow max-w-md">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text"
                           class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Search notes...">
                </div>
                <div class="flex space-x-2">
                    <select class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 rounded-md">
                        <option>All Notes</option>
                        <option>Recently Updated</option>
                        <option>Most Viewed</option>
                        <option>My Notes</option>
                    </select>
                    <button class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="-ml-0.5 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        Filter
                    </button>
                </div>
            </div>
        </div>

        <!-- Notes Grid -->
        @if($notes->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($notes as $note)
                    <div class="group bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200 border border-gray-200 hover:border-blue-300 overflow-hidden">
                        <a href="{{ route('teams.notes.show', [$team, $note]) }}" class="block h-full">
                            <div class="p-5">
                                <div class="flex justify-between items-start">
                                    <h3 class="text-lg font-semibold text-gray-900 group-hover:text-blue-600 truncate">
                                        {{ Str::title($note->title) }}
                                    </h3>
                                    @if($note->is_pinned)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">
                                            Pinned
                                        </span>
                                    @endif
                                </div>
                                <p class="mt-2 text-sm text-gray-600 line-clamp-3">
                                    {{ Str::limit(strip_tags($note->content), 150) }}
                                </p>
                            </div>
                            <div class="px-5 py-3 border-t border-gray-200 bg-gray-50">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <div class="flex-shrink-0">
                                            <img class="h-6 w-6 rounded-full" src="{{ $note->author->profile_photo_url }}" alt="{{ $note->author->name }}">
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            <span class="font-medium text-gray-900">{{ Str::title($note->author->name) }}</span>
                                            <span>• {{ $note->updated_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        <span>{{ $note->views_count }} views</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            {{-- <div class="mt-8">
                {{ $notes->links() }}
            </div> --}}
        @else
            <div class="bg-white rounded-lg shadow overflow-hidden text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-900">No notes yet</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by creating your first note.</p>
                <div class="mt-6">
                    <a href="{{ route('teams.notes.create', $team) }}"
                       class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        New Note
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-layout>
