<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ManageUsers extends Component
{
    use WithPagination;

    public $search = '';

    // Use Tailwind CSS for pagination styling
    protected $paginationTheme = 'tailwind';

    // Allow search to be in the URL query string
    protected $queryString = ['search'];

    // Reset pagination when the search term is updated
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Delete a user by their ID
    public function deleteUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        session()->flash('message', 'User deleted successfully!');
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.manage-users', [
            'users' => $users,
        ]);
    }
}
