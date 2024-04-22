<?php

namespace App\Livewire\Frontend\Account;

use App\Models\User;
use Livewire\Component;
use App\Models\Position;
use App\Models\Department;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    public $address, $firstname, $lastname, $middlename, $department_id, $position_id, $ud_id, $username, $email, $password, $old_password;

    public function render()
    {
        $departments = Department::orderBy('created_at', 'DESC')->get();
        $positions = Position::orderBy('created_at', 'DESC')->get();
        $users = UserDetails::where('users_id', auth()->user()->id)->first();

        // If UserDetails for the current user doesn't exist, use User model
        if (!$users) {
            $users = auth()->user();
        }
        return view('livewire.frontend.account.profile', compact('departments', 'positions', 'users'));
    }

    public function saveUserdetails()
    {
        if (Auth::check()) {
            $this->validate([
                'department_id' => 'required|integer',
                'position_id' => 'required|integer',
                'firstname' => 'required|string|min:2',
                'lastname' => 'required|string|min:2',
                'middlename' => 'nullable|string|min:2',
                'address' => 'required|string|min:10',
            ], [
                'department_id.required' => 'The department field is required.',
                'position_id.required' => 'The position field is required.',
                'firstname.required' => 'The first name field is required.',
                'lastname.required' => 'The last name field is required.',
                'address.required' => 'Please enter your complete address.',
            ]);

            $existingDetails = UserDetails::where('users_id', $this->ud_id)->first();

            if ($existingDetails) {
                $existingDetails->update([
                    'firstname' => $this->firstname,
                    'lastname' => $this->lastname,
                    'middlename' => $this->middlename,
                    'department' => $this->department_id,
                    'position' => $this->position_id,
                    'address' => $this->address,
                ]);
            } else {
                UserDetails::create([
                    'users_id' => auth()->user()->id,
                    'firstname' => $this->firstname,
                    'lastname' => $this->lastname,
                    'middlename' => $this->middlename,
                    'department' => $this->department_id,
                    'position' => $this->position_id,
                    'address' => $this->address,
                ]);
                User::where('id', auth()->user()->id)->update(['status' => 'completed']);
            }
            $this->dispatch('messageModal', status: 'success', position: 'top', message: 'Information updated successfully');
            return $this->redirect('/myaccount/profile', navigate: true);
        }
    }


    public function saveLogindetails()
    {
        $this->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:8'],
            'old_password' => ['nullable', 'string', function ($attribute, $value, $fail) {
                if (!empty($this->password)) {
                    if (!Hash::check($value, auth()->user()->password)) {
                        $fail('The old password is incorrect.');
                    }
                }
            }],
        ]);

        // Check if the old password is provided and correct
        if (empty($this->old_password) || Hash::check($this->old_password, auth()->user()->password)) {

            $user = User::where('id', $this->ud_id)->first();

            $user->update([
                'username' => $this->username,
                'email' => $this->email,
                'password' => empty($this->password) ? $user->password : Hash::make($this->password),
            ]);

            $this->dispatch('messageModal', status: 'success', position: 'top', message: 'Information updated successfully');
            return $this->redirect('/myaccount/profile', navigate: true);
        } else {
            $user = User::where('id', $this->ud_id)->first();

            $user->update([
                'username' => $this->username,
                'email' => $this->email,

            ]);
            $this->dispatch('messageModal', status: 'success', position: 'top', message: 'Information updated successfully');
            return $this->redirect('/myaccount/profile', navigate: true);

        }
    }

    public function editUsersDetails(int $id)
    {
        $users = UserDetails::where('users_id', $id)->first();

        if ($users) {
            $this->ud_id = $users->usersDetails->id ?? 0;
            $this->firstname = $users->firstname ?? '';
            $this->lastname = $users->lastname  ?? '';
            $this->middlename = $users->middlename  ?? '';
            $this->address = $users->address  ?? '';
            $this->position_id = $users->positionDetails->id  ?? 0;
            $this->department_id = $users->departmentDetails->id  ?? 0;



            $this->dispatch('editModal');
        }
    }

    public function editLoginDetails(int $id)
    {

        $users = UserDetails::where('users_id', $id)->first();

        if ($users) {
            $this->ud_id = $users->usersDetails->id ?? 0;
            $this->username = $users->username ?? $users->usersDetails->username;
            $this->email = $users->email  ?? $users->usersDetails->email;

            $this->dispatch('editModal');
        }
    }
}
