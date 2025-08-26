<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $none = "No Users";
    public $userIdBeingEdited;
    public $role;
    public $confirmingUserDeletion = false;
    public $userIdBeingDeleted;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $users = User::paginate(8);
        return view('livewire.admin.users.index', compact('users'));
    }

    public function editUser($userId)
    {
        $user = User::findOrFail($userId);
        $this->userIdBeingEdited = $userId;
        $this->role = $user->is_admin ? 'admin' : 'user';
    }

    public function updateUser()
    {
        $user = User::findOrFail($this->userIdBeingEdited);
        $user->is_admin = ($this->role === 'admin') ? 1 : 0;
        $user->save();

        session()->flash('message', 'Rôle mis à jour avec succès.');
        $this->reset('userIdBeingEdited', 'role');
    }

    public function confirmDelete($userId)
    {
        $this->confirmingUserDeletion = true;
        $this->userIdBeingDeleted = $userId;
    }

    public function deleteUser()
    {
        User::findOrFail($this->userIdBeingDeleted)->delete();
        session()->flash('message', 'Utilisateur supprimé avec succès.');
        $this->reset('confirmingUserDeletion', 'userIdBeingDeleted');
    }
}

