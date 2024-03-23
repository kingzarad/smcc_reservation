<?php

namespace App\Livewire\Admin\Position;

use App\Models\Position;
use Livewire\Component;

class Index extends Component
{
    public $position_name, $p_id;

    public function render()
    {
        $position = Position::orderBy('created_at', 'DESC')->get();
        return view('livewire.admin.position.index', ['positions' => $position]);
    }

    protected function rules()
    {
        return [
            'position_name' => 'required|string|min:4',
        ];
    }

    public function savePosition()
    {
        $validatedData = $this->validate();

        $existing = Position::where('position_name', $validatedData['position_name'])->exists();

        if ($existing) {
            // Department already exists, show an error message or handle it as needed
            $this->dispatch('saveModal', status: 'warning', position: 'top', message: 'Position already exist.');
            return;
        }

        Position::create($validatedData);
        // Reset the input fields
        $this->resetInput();
        $this->dispatch('saveModal', status: 'success',  position: 'top', message: 'Position save successfully.');
    }

    public function updatePosition()
    {
        $validatedData = $this->validate();

        Position::where('id', $this->p_id)->update([
            'position_name' => $validatedData['position_name']
        ]);
        $this->dispatch('updateModal', status: 'success',  position: 'top', message: 'Position updated successfully.');

    }

    public function editPosition(int $id)
    {
        $position = Position::find($id);
        if ($position) {
            $this->p_id = $position->id;
            $this->position_name = $position->position_name;
            $this->dispatch('editModal');
        } else {
            $this->redirect('/admin/settings/position');
        }
    }

    public function deletePosition(int $id)
    {
        $this->p_id = $id;
        $this->dispatch('editModal');
    }


    public function destroyPosition()
    {

        $checker = Position::find($this->p_id);

        if (!$checker) {
            $this->dispatch('destroyModal', status: 'warning', position: 'top', message: 'Position not found!', modal: '#deletePositionModal');
            return;
        }

        $count = Position::count();
        if ($count === 1) {
            $this->dispatch('destroyModal', status: 'warning', position: 'top', message: 'You can only edit, but you cannot delete the only remaining position.', modal: '#deletePositionModal');
            return;
        }

        // Delete the category
        $checker->delete();

        $this->dispatch('destroyModal', status: 'warning',  position: 'top', message: 'Position delete successfully.', modal: '#deletePositionModal');
    }

    public function closeModal()
    {
        $this->resetInput();
        $this->dispatch('closeModal');
    }

    private function resetInput()
    {
        $this->reset(['position_name']);
    }
}
