<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Manage Users</h1>

    @if (session()->has('message'))
        <div class="bg-green-200 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="mb-6 flex">
        <input 
            type="text" 
            wire:model.debounce.300ms="search"
            placeholder="Search users..."
            class="border border-gray-300 rounded-lg p-2 w-64"
        >
        <button 
            wire:click="$refresh"
            class="ml-2 bg-blue-600 text-white px-4 py-2 rounded-lg"
        >
            Search
        </button>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <!-- Edit link (if editing is handled elsewhere) -->
                            <a href="{{ route('admin.manage.users.edit', $user->id) }}" class="text-blue-600 hover:text-blue-800 mr-3">
                                Edit
                            </a>
                            <!-- Delete button using Livewire action -->
                            <button wire:click="deleteUser({{ $user->id }})" class="text-red-600 hover:text-red-800">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">
            {{ $users->links() }}
        </div>
    </div>
</div>
