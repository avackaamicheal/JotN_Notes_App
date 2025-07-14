{{-- <div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    {{-- <h2>{{ $note->title }}</h2>
    <p>{{ $note->content }}</p>
    <p><strong>Author:</strong> {{ $note->author->name }}</p>

    <a href="{{ route('teams.notes.edit', [$team, $note]) }}">Edit</a>

    <form method="POST" action="{{ route('teams.notes.destroy', [$team, $note]) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

{{-- </div> --}}
<x-layout>
    <x-slot:heading>
        Team Notes
    </x-slot:heading>

<!-- Main Content -->
    <main class="flex-grow container mx-auto p-6">
        <div class="w-full max-w-4xl mx-auto">
            <!-- Note Header -->
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center">
                    <i class="fab fa-microsoft text-blue-500 text-xl mr-3"></i>
                    <h2 class="text-xl font-semibold text-gray-800">{{ $team->name }}</h2>
                    {{-- <h3 class="text-xl font-semibold text-gray-800">{{ $team->description }}</h3> --}}
                </div>
                <a href="{{ route('teams.notes.create', ['team' => $team->id]) }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                    <i class="fas fa-plus mr-2"></i>Create New Note
                </a>
            </div>
             <!-- Note Card -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <!-- Note Header -->
                <div class="border-b border-gray-200 px-6 py-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-medium text-gray-900">{{ $note->title }}</h3>
                        <div class="flex space-x-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                Last updated: {{ $note->updated_at }}
                            </span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Active
                            </span>
                        </div>
                    </div>
                    <p class="mt-1 text-sm text-gray-500">
                        Created by: {{ $note->author->name }} • {{ $note->created_at }}
                    </p>
                </div>
                <!-- Note Content -->
                <div class="px-6 py-4">
                    <div class="prose max-w-none">
                        <h4>{{ $note->content }}</h4>
                    </div>
                </div>
                <!-- Note Footer -->
                <div class="bg-gray-50 px-6 py-3 flex justify-between items-center border-t border-gray-200">
                    <div class="flex space-x-2">
                        <span class="inline-flex items-center text-sm text-gray-500">
                            <i class="fas fa-users mr-1.5"></i> 12 team members have access
                        </span>
                    </div>
                    <div class="flex space-x-3">
                        <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </button>
                        <button class="text-gray-600 hover:text-gray-800 text-sm font-medium">
                            <i class="fas fa-share-alt mr-1"></i>Share
                        </button>
                        <form action="{{ route('teams.notes.destroy', ['team' => $team->id, 'note' => $note->id]) }}"
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this note?');">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:text-red-800 text-sm font-medium">
                            <i class="fas fa-trash-alt mr-1"></i>Delete
                            </button>
                        </form>
                        <a href="{{ route('teams.notes.index', $team->id) }}">
                            <button class="text-red-600 hover:text-red-800 text-sm font-medium">
                                <i class="fa fa-long-arrow-left" aria-hidden="true"></i>Back
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

</x-layout>

