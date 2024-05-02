<?php

namespace App\Livewire\Admin\Department;

use App\Models\Department;
use Livewire\Component;

class Index extends Component
{

    public $department_name, $d_id;

    public function render()
    {
        $department = Department::orderBy('created_at', 'DESC')->get();
        return view('livewire.admin.department.index', ['department' => $department]);
    }

    protected function rules()
    {
        return [
            'department_name' => 'required|string|min:3',
        ];
    }

    public function saveDepartment()
    {
        $validatedData = $this->validate();

        $existingDepartment = Department::where('department_name', $validatedData['department_name'])->exists();

        if ($existingDepartment) {
            // Department already exists, show an error message or handle it as needed
            $this->dispatch('saveModal', status: 'warning', position: 'top', message: 'Department already exist.');
            return;
        }

        Department::create($validatedData);
        // Reset the input fields
        $this->resetInput();
        $this->dispatch('saveModal', status: 'success',  position: 'top', message: 'Department save successfully.');
    }

    public function updateDepartment()
    {
        $validatedData = $this->validate();

        Department::where('id', $this->d_id)->update([
            'department_name' => $validatedData['department_name']
        ]);
        $this->dispatch('updateModal', status: 'success',  position: 'top', message: 'Department updated successfully.');
    }

    public function editDepartment(int $id)
    {
        $department = Department::find($id);
        if ($department) {
            $this->d_id = $department->id;
            $this->department_name = $department->department_name;
            $this->dispatch('editModal');
        } else {
            $this->redirect('/admin/settings/department');
        }
    }

    public function deleteDepartment(int $id)
    {
        $this->d_id = $id;
        $this->dispatch('editModal');
    }

    public function destroyDepartment()
    {

        $checker = Department::find($this->d_id);

        if (!$checker) {
            $this->dispatch('destroyModal', status: 'warning', position: 'top', message: 'Department not found!', modal: '#deleteDepartmentModal');
            return;
        }

        $count = Department::count();
        if ($count === 1) {
            $this->dispatch('destroyModal', status: 'warning', position: 'top', message: 'You can only edit, but you cannot delete the only remaining department.', modal: '#deleteDepartmentModal');
            return;
        }

        // Delete the category
        $checker->delete();

        $this->dispatch('destroyModal', status: 'warning',  position: 'top', message: 'Department delete successfully.', modal: '#deleteDepartmentModal');
    }

    public function closeModal()
    {
        $this->resetInput();
        $this->dispatch('closeModal');
    }

    private function resetInput()
    {
        $this->reset(['department_name']);
    }
}
