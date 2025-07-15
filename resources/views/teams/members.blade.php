<x-layout>
    <x-slot:heading>
        members
    </x-slot:heading>
    {{-- <div class="max-w-4xl mx-auto p-6 bg-white shadow rounded-lg">
    <h1 class="text-xl font-bold mb-6">Manage Members - {{ $team->name }}</h1> --}}

    {{-- Invite Form --}}
    {{-- <form method="POST" action="{{ route('teams.members.invite', $team->id) }}" class="mb-6 flex gap-4">
        @csrf
        <input type="email" name="email" placeholder="User email" required
               class="border px-3 py-2 rounded w-full" />
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Invite</button>
    </form> --}}

    {{-- Members List --}}
    {{-- <div class="space-y-4">
        @foreach ($members as $member)
            <div class="flex justify-between items-center border p-4 rounded">
                <div>
                    <p class="text-lg font-medium">{{ $member->name }} ({{ $member->email }})</p>
                    <p class="text-sm text-gray-500">
                        Role:
                        <span class="inline-block px-2 py-1 bg-gray-200 text-xs rounded">
                            {{ ucfirst($member->pivot->role) }}
                        </span>
                    </p>
                </div>

                @if ($member->pivot->role !== 'Owner')
                    <form action="{{ route('teams.members.remove', ['team' => $team->id, 'user' => $member->id]) }}"
                          method="POST" onsubmit="return confirm('Remove this member?');">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:text-red-800">Remove</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
</div> --}}

<div class="flex-grow container mx-auto p-6">
    <div class="w-full max-w-6xl mx-auto">
        <!-- Header with Invite Button -->
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center">
                <i class="fab fa-microsoft text-blue-500 text-xl mr-3"></i>
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">{{ $team->name }} Members</h2>
                    <p class="text-sm text-gray-500">
                        {{ $team->users->count() }} members •
                        {{ $team->users->where('pivot.role', 'owner')->count() }} admins
                    </p>
                </div>
            </div>
            @can('inviteMembers', $team)
            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                <i class="fas fa-user-plus mr-2"></i>Invite Members
            </button>
            @endcan
        </div>

        <!-- Members Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Member
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Joined
                            </th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($members as $member)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $member->name }}</div>
                                        {{-- <div class="text-sm text-gray-500">{{ ucfirst($member->pivot->role) }}</div> --}}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $member->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $member->pivot->role === 'owner' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                    {{ ucfirst($member->pivot->role) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $member->pivot->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">
                                    @if ($member->id !== $team->created_by)
                                        @can('remove', [$team, $member])
                                        <button onclick="confirmRemoveMember({{ $member->id }}, '{{ $member->name }}')"
                                            class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-user-minus"></i>
                                        </button>
                                        @endcan
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Invite Member Modal -->
        <div id="inviteModal" class="fixed z-50 inset-0 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" onclick="closeInviteModal()">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                    <form action="{{ route('teams.members.invite', $team) }}" method="POST">
                        @csrf
                        <div>
                            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-100">
                                <i class="fas fa-user-plus text-blue-600"></i>
                            </div>
                            <div class="mt-3 text-center sm:mt-5">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Invite Team Members
                                </h3>
                                <div class="mt-2">
                                    <div class="space-y-4">
                                        <div>
                                            <label for="emails" class="block text-sm font-medium text-gray-700 text-left">Email Addresses</label>
                                            <div class="mt-1">
                                                <textarea id="emails" name="emails" rows="3" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Enter email addresses, separated by commas" required></textarea>
                                            </div>
                                            <p class="mt-2 text-sm text-gray-500">
                                                Invite multiple members by entering their email addresses.
                                            </p>
                                        </div>
                                        <div>
                                            <label for="role" class="block text-sm font-medium text-gray-700 text-left">Role</label>
                                            <select id="role" name="role" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md" required>
                                                <option value="member">Member</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:col-start-2 sm:text-sm">
                                Send Invites
                            </button>
                            <button type="button" onclick="closeInviteModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Remove Member Confirmation Modal -->
        <div id="removeModal" class="fixed z-50 inset-0 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" onclick="closeRemoveModal()">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                    <form id="removeForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <div>
                            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                                <i class="fas fa-exclamation-triangle text-red-600"></i>
                            </div>
                            <div class="mt-3 text-center sm:mt-5">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Remove Team Member
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500" id="removeModalText">
                                        Are you sure you want to remove <span id="removeMemberName"></span> from the team?
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:col-start-2 sm:text-sm">
                                Remove
                            </button>
                            <button type="button" onclick="closeRemoveModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</x-layout>

