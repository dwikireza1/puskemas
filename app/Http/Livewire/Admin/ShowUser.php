<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserManajement extends Component
{
    public $user_id, $name, $email, $role_id;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'name'      => 'required|string|max:255',
        'email'     => 'required|string|email|max:255|unique:users,email',
        'role_id'   => 'required|integer',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveUser()
    {
        $validatedData = $this->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users,email',
            'role_id'   => 'required|integer',
        ]);

        User::create($validatedData);
        session()->flash('success', 'User created successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editUser($user_id)
    {
        $user = User::find($user_id);
        if ($user) {
            $this->user_id   = $user->id;
            $this->name      = $user->name;
            $this->email     = $user->email;
            $this->role_id   = $user->role_id;
        } else {
            return redirect()->to('/edituser');
        }
    }

    public function updateUser()
    {
        $validatedData = $this->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users,email,' . $this->user_id,
            'role_id'   => 'required|integer',
        ]);

        User::where('id', $this->user_id)->update($validatedData);

        session()->flash('success', 'User updated successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function deleteUser($user_id)
    {
        $this->user_id = $user_id;
    }

    public function destroyUser()
    {
        User::find($this->user_id)->delete();
        session()->flash('success', 'User deleted successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function resetInput()
    {
        $this->user_id = '';
        $this->name = '';
        $this->email = '';
        $this->role_id = '';
    }

    public function render()
    {
        return view('livewire.admin.show-user');
    }
}
