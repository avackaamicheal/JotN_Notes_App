<x-layout>
    <x-slot:heading>
        Dashboard
    </x-slot:heading>

    <div class="w-full mx-auto max-w-7xl">
        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-3 justify-between pb-6">
            <a href="{{ route('teams.create') }}"
               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Create a Team
            </a>
            <a href="{{ route('teams.join') }}"
               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                Join a Team
            </a>
        </div>

        <!-- Teams Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Teams Owned Card -->
            <div class="bg-white rounded-lg shadow divide-y divide-gray-200">
                <div class="px-6 py-4 flex items-center">
                    <svg class="h-6 w-6 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <h2 class="text-lg font-semibold text-gray-900">Teams Owned</h2>
                </div>
                <div class="px-6 py-4 space-y-4">
                    @forelse ($ownedTeams as $team)
                        <div class="group relative bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200 border border-gray-200 hover:border-blue-300 overflow-hidden">
                            <div class="p-5">
                                <!-- Team Header -->
                                <div class="flex justify-between items-start mb-4">
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-lg font-semibold text-gray-800 truncate">
                                            <a href="{{ route('teams.notes.index', $team->id) }}" class="hover:text-blue-600 focus:outline-none">
                                                {{ Str::title($team->name) }}
                                            </a>
                                        </h3>
                                        @if($team->description)
                                            <p class="text-sm text-gray-500 mt-1 line-clamp-2">{{ $team->description }}</p>
                                        @endif
                                    </div>

                                    <!-- Invite Code Badge -->
                                    <div class="ml-4 flex-shrink-0">
                                        <div class="text-xs text-gray-500 mb-1 text-right">Invite Code</div>
                                        <div class="inline-flex items-center px-2.5 py-1 rounded-full text-sm font-medium bg-blue-50 text-blue-700 group-hover:bg-blue-100 transition-colors">
                                            <span class="select-all">{{ $team->invite_code }}</span>
                                            <button class="ml-2 text-blue-500 hover:text-blue-700 focus:outline-none"
                                                    onclick="copyToClipboard('{{ $team->invite_code }}')">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex items-center justify-between border-t border-gray-100 pt-4">
                                    <a href="{{ route('teams.members.index', $team->id) }}"
                                       class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-700 bg-blue-50 hover:bg-blue-100 focus:outline-none transition-colors">
                                        <svg class="-ml-0.5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                        Manage Team
                                    </a>

                                    <div class="flex space-x-2">
                                        <a href="{{ route('teams.notes.index', $team->id) }}"
                                           class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none transition-colors">
                                            <svg class="-ml-0.5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            View Notes
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No teams created yet</h3>
                            <p class="mt-1 text-sm text-gray-500">Get started by creating your first team.</p>
                            <div class="mt-6">
                                <a href="{{ route('teams.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    New Team
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Teams Joined Card -->
            <div class="bg-white rounded-lg shadow divide-y divide-gray-200">
                <div class="px-6 py-4 flex items-center">
                    <svg class="h-6 w-6 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <h2 class="text-lg font-semibold text-gray-900">Teams Joined</h2>
                </div>
                <div class="px-6 py-4 space-y-4">
                    @forelse ($joinedTeams as $team)
                        <div class="group relative bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200 border border-gray-200 hover:border-blue-300 overflow-hidden">
                            <div class="p-5">
                                <!-- Team Header -->
                                <div class="flex justify-between items-start mb-4">
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-lg font-semibold text-gray-800 truncate">
                                            <a href="{{ route('teams.notes.index', $team->id) }}" class="hover:text-blue-600 focus:outline-none">
                                                {{ Str::title($team->name) }}
                                            </a>
                                        </h3>
                                        @if($team->description)
                                            <p class="text-sm text-gray-500 mt-1 line-clamp-2">{{ $team->description }}</p>
                                        @endif
                                    </div>

                                    <!-- Invite Code Badge -->
                                    <div class="ml-4 flex-shrink-0">
                                        <div class="text-xs text-gray-500 mb-1 text-right">Invite Code</div>
                                        <div class="inline-flex items-center px-2.5 py-1 rounded-full text-sm font-medium bg-blue-50 text-blue-700 group-hover:bg-blue-100 transition-colors">
                                            <span class="select-all">{{ $team->invite_code }}</span>
                                            <button class="ml-2 text-blue-500 hover:text-blue-700 focus:outline-none"
                                                    onclick="copyToClipboard('{{ $team->invite_code }}')">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex items-center justify-between border-t border-gray-100 pt-4">
                                    <a href="{{ route('teams.members.index', $team->id) }}"
                                       class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-700 bg-blue-50 hover:bg-blue-100 focus:outline-none transition-colors">
                                        <svg class="-ml-0.5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                        View Members
                                    </a>

                                    <div class="flex space-x-2">
                                        <a href="{{ route('teams.notes.index', $team->id) }}"
                                           class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none transition-colors">
                                            <svg class="-ml-0.5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            View Notes
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No team memberships yet</h3>
                            <p class="mt-1 text-sm text-gray-500">Join a team using an invite code or ask for an invitation.</p>
                            <div class="mt-6">
                                <a href="{{ route('teams.join') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                    </svg>
                                    Join Team
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                // Consider using a toast notification instead of alert
                const notification = document.createElement('div');
                notification.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-md shadow-lg transition-opacity duration-300 opacity-0';
                notification.textContent = 'Invite code copied!';
                document.body.appendChild(notification);

                setTimeout(() => {
                    notification.classList.remove('opacity-0');
                    notification.classList.add('opacity-100');
                }, 10);

                setTimeout(() => {
                    notification.classList.remove('opacity-100');
                    notification.classList.add('opacity-0');
                    setTimeout(() => notification.remove(), 300);
                }, 2000);
            });
        }
    </script>
    @endpush
</x-layout>
