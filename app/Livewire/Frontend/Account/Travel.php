<?php

namespace App\Livewire\Frontend\Account;

use App\Models\TravelOrder;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Travel extends Component
{
    use WithFileUploads;

    public $note, $td_id, $photos;

    public function render()
    {
        $travelist = TravelOrder::where(['user_id' =>  auth()->user()->id])->orderBy('created_at', 'DESC')->get();
        return view('livewire.frontend.account.travel', ['travelist' =>  $travelist]);
    }

    public function uploadTravelOrder()
    {
        $validatedData = $this->validate([
            'note' => 'nullable|string|min:3',
            'photos' => 'required|image',
        ]);

        $imagePath = $this->photos->store('photos/travel-order', 'public');
        $travelData = [
            'note' => $validatedData['note'] ?? 'no note added',
            'image' => $imagePath,
            'user_id' => auth()->user()->id,
        ];

        TravelOrder::create($travelData);
        $this->dispatch('messageModal', status: 'success', position: 'top', message: 'Travel Order uploaded successfully');
        return $this->redirect('/myaccount/travel', navigate: true);
    }

    public function closeModal()
    {
        return $this->redirect('/myaccount/travel', navigate: true);
    }
}
