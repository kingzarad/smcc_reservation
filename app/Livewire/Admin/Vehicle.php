<?php

namespace App\Livewire\Admin;

use App\Models\Vehicle as ModelsVehicle;
use Livewire\Component;

class Vehicle extends Component
{
    public $name, $id;

    public function render()
    {
        $list = ModelsVehicle::orderBy('created_at', 'DESC')->get();
        return view('livewire.admin.vehicle.index', ['vehicle_list' => $list]);
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|min:3',
        ];
    }

    public function saveVehicle()
    {
        $validatedData = $this->validate();

        $existing = ModelsVehicle::where('name', $validatedData['name'])->exists();

        if ($existing) {
            $this->dispatch('saveModal', status: 'warning', position: 'top', message: 'Vehicle already exist.');
            return;
        }

        ModelsVehicle::create($validatedData);
        // Reset the input fields
        $this->resetInput();
        $this->dispatch('saveModal', status: 'success',  position: 'top', message: 'Vehicle save successfully.');
    }

    public function updateVehicle()
    {
        $validatedData = $this->validate();

        ModelsVehicle::where('id', $this->id)->update([
            'name' => $validatedData['name'],
        ]);
        $this->dispatch('updateModal', status: 'success',  position: 'top', message: 'Vehicle updated successfully.');
    }

    public function editVehicle(int $id)
    {
        $value = ModelsVehicle::find($id);
        if ($value) {
            $this->id = $value->id;
            $this->name = $value->name;
            $this->dispatch('editModal');
        } else {
            $this->redirect('/admin/vehicle');
        }
    }

    public function deleteVehicle(int $id)
    {
        $this->id = $id;
        $this->dispatch('editModal');
    }

    public function destroyVehicle()
    {

        $checker = ModelsVehicle::find($this->id);

        if (!$checker) {
            $this->dispatch('destroyModal', status: 'warning', position: 'top', message: 'Vehicle not found!', modal: '#deleteVehicleModal');
            return;
        }

        $count = ModelsVehicle::count();
        if ($count === 1) {
            $this->dispatch('destroyModal', status: 'warning', position: 'top', message: 'You can only edit, but you cannot delete the only remaining Vehicle.', modal: '#deleteVehicleModal');
            return;
        }

        $checker->delete();

        $this->dispatch('destroyModal', status: 'warning',  position: 'top', message: 'Vehicle delete successfully.', modal: '#deleteVehicleModal');
    }

    public function closeModal()
    {
        $this->resetInput();
        $this->dispatch('closeModal');
    }

    private function resetInput()
    {
        $this->reset(['name']);
    }
}
