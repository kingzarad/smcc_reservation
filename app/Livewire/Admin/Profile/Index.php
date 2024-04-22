<?php

namespace App\Livewire\Admin\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Index extends Component
{
    public  $id, $username, $email, $password, $old_password;


    public function render()
    {
        return view('livewire.admin.profile.index');
    }

    public function editLoginDetails()
    {
        $users = User::where('id',  Auth::id())->first();

        if ($users) {
            $this->id = $users->id;
            $this->username = $users->username;
            $this->email = $users->email;

            $this->dispatch('editModal');
        }
    }

    public function saveLogindetails()
    {
        $user = User::findOrFail($this->id);

        $this->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:8'],
            'old_password' => ['nullable', 'string', function ($attribute, $value, $fail) use ($user) {
                if (!empty($this->password)) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('The old password is incorrect.');
                    }
                }
            }],
        ]);

        // Check if the old password is provided and correct
        if (empty($this->old_password) || Hash::check($this->old_password, auth()->user()->password)) {
            $user->update([
                'username' => $this->username,
                'email' => $this->email,
                'password' => empty($this->password) ? $user->password : Hash::make($this->password),
            ]);

            $this->dispatch('saveModal', status: 'success', position: 'top', message: 'Information updated successfully');
        } else {
            $user->update([
                'username' => $this->username,
                'email' => $this->email,
            ]);

            $this->dispatch('saveModal', status: 'success', position: 'top', message: 'Information updated successfully');
        }

        // return $this->redirect('/admin/users/management', navigate: true);
    }
}
