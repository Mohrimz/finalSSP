<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ManageUsers extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'tailwind';

    protected $queryString = ['search'];

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
