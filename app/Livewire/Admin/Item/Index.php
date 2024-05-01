<?php

namespace App\Livewire\Admin\Item;

use App\Models\Item;
use Livewire\Component;

class Index extends Component
{

    public $name, $quantity, $id;

    public function render()
    {
        $list = Item::orderBy('created_at', 'DESC')->get();
        return view('livewire.admin.item.index', ['item' => $list]);
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'quantity' => 'required|int',
        ];
    }

    public function saveItem()
    {
        $validatedData = $this->validate();

        $existing = Item::where('name', $validatedData['name'])->exists();

        if ($existing) {
            $this->dispatch('saveModal', status: 'warning', position: 'top', message: 'Item already exist.');
            return;
        }

        Item::create($validatedData);
        // Reset the input fields
        $this->resetInput();
        $this->dispatch('saveModal', status: 'success',  position: 'top', message: 'Item save successfully.');
    }

    public function updateItem()
    {
        $validatedData = $this->validate();

        Item::where('id', $this->id)->update([
            'name' => $validatedData['name'],
            'quantity' => $validatedData['quantity'],
        ]);
        $this->dispatch('updateModal', status: 'success',  position: 'top', message: 'Item updated successfully.');
    }

    public function editItem(int $id)
    {
        $value = Item::find($id);
        if ($value) {
            $this->id = $value->id;
            $this->name = $value->name;
            $this->quantity = $value->quantity;
            $this->dispatch('editModal');
        } else {
            $this->redirect('/admin/item');
        }
    }

    public function deleteItem(int $id)
    {
        $this->id = $id;
        $this->dispatch('editModal');
    }

    public function destroyItem()
    {

        $checker = Item::find($this->id);

        if (!$checker) {
            $this->dispatch('destroyModal', status: 'warning', position: 'top', message: 'Item not found!', modal: '#deleteItemModal');
            return;
        }

        $count = Item::count();
        if ($count === 1) {
            $this->dispatch('destroyModal', status: 'warning', position: 'top', message: 'You can only edit, but you cannot delete the only remaining Item.', modal: '#deleteItemModal');
            return;
        }

        $checker->delete();

        $this->dispatch('destroyModal', status: 'warning',  position: 'top', message: 'Item delete successfully.', modal: '#deleteItemModal');
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
