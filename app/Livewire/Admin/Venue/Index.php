<?php

namespace App\Livewire\Admin\Venue;

use App\Models\Venue;
use Livewire\Component;

class Index extends Component
{
    public $name, $quantity, $id;


    public function render()
    {
        $list = Venue::orderBy('created_at', 'DESC')->get();
        return view('livewire.admin.venue.index', ['venue' => $list]);
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'quantity' => 'required|int',
        ];
    }

    public function saveVenue()
    {
        $validatedData = $this->validate();

        $existing = Venue::where('name', $validatedData['name'])->exists();

        if ($existing) {
            $this->dispatch('saveModal', status: 'warning', position: 'top', message: 'Venue already exist.');
            return;
        }

        Venue::create($validatedData);
        // Reset the input fields
        $this->resetInput();
        $this->dispatch('saveModal', status: 'success',  position: 'top', message: 'Venue save successfully.');
    }

    public function updateVenue()
    {
        $validatedData = $this->validate();

        Venue::where('id', $this->id)->update([
            'name' => $validatedData['name'],
            'quantity' => $validatedData['quantity'],
        ]);
        $this->dispatch('updateModal', status: 'success',  position: 'top', message: 'Venue updated successfully.');
    }

    public function editVenue(int $id)
    {
        $value = Venue::find($id);
        if ($value) {
            $this->id = $value->id;
            $this->name = $value->name;
            $this->quantity = $value->quantity;
            $this->dispatch('editModal');
        } else {
            $this->redirect('/admin/venue');
        }
    }

    public function deleteVenue(int $id)
    {
        $this->id = $id;
        $this->dispatch('editModal');
    }

    public function destroyVenue()
    {

        $checker = Venue::find($this->id);

        if (!$checker) {
            $this->dispatch('destroyModal', status: 'warning', position: 'top', message: 'Venue not found!', modal: '#deleteVenueModal');
            return;
        }

        $count = Venue::count();
        if ($count === 1) {
            $this->dispatch('destroyModal', status: 'warning', position: 'top', message: 'You can only edit, but you cannot delete the only remaining Venue.', modal: '#deleteVenueModal');
            return;
        }

        $checker->delete();

        $this->dispatch('destroyModal', status: 'warning',  position: 'top', message: 'Venue delete successfully.', modal: '#deleteVenueModal');
    }

    public function closeModal()
    {
        $this->resetInput();
        $this->dispatch('closeModal');
    }

    private function resetInput()
    {
        $this->reset(['name', 'quantity']);
    }
}
