<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithFileUploads;

    public $name, $c_id, $status, $photos, $photos_display;

    public function render()
    {
        $categories = Category::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }


    public function saveCategory()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|min:3',
            'status' => 'nullable|boolean',
            'photos' => 'required|image',
        ]);

        $existing = Category::where('name', $validatedData['name'])->exists();
        if ($existing) {

            $this->dispatch('saveModal', status: 'warning', position: 'top', message: 'Category already exist.');
            return;
        }


        $imagePath = $this->photos->store('photos', 'public');
        $categoryData = [
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['name']),
            'status' => $validatedData['status'] == true ? '0' : '1',
            'image' => $imagePath,
        ];

        Category::create($categoryData);
        // Reset the input fields
        $this->resetInput();
        $this->dispatch('saveModal', status: 'success',  position: 'top', message: 'Category save successfully.');
    }

    public function updateCategory()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|min:3',
            'status' => 'nullable|boolean',
            'photos' => 'nullable|max:3072',
        ]);

        $category = Category::findOrFail($this->c_id);

        if (!empty($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        $imagePath = null; // Initialize image path to null

        if (!empty($this->photos)) {
            $imagePath = $this->photos->store('photos', 'public');
        }

        $categoryData = [
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['name']),
            'status' => $validatedData['status'] == true ? false : true,
        ];

        // Update image path only if photos are provided
        if (!empty($imagePath)) {
            $categoryData['image'] = $imagePath;
        }

        Category::where('id', $this->c_id)->update($categoryData);

        $this->dispatch('updateModal', status: 'success', position: 'top', message: 'Category updated successfully.');
    }


    public function editCategory(int $id)
    {

        $category = Category::findOrFail($id);

        if ($category) {
            $this->c_id = $category->id;
            $this->name = $category->name;
            $this->photos_display = $category->image;
            $this->status = $category->status == 0 ? true  : false;
            $this->dispatch('editModal');
        } else {
            $this->redirect('/admin/category');
        }
    }

    public function deleteCategory(int $id)
    {

        $this->c_id = $id;
        $this->dispatch('editModal');
    }

    public function destroyCategory()
    {
        $category = Category::find($this->c_id);

        if (!$category) {
            $this->dispatch('destroyModal', status: 'warning', position: 'top', message: 'Category not found!', modal: '#deleteCategoryModal');
            return;
        }

        $count = Category::count();
        if ($count === 1) {
            $this->dispatch('destroyModal', status: 'warning', position: 'top', message: 'You can only edit, but you cannot delete the only remaining category.', modal: '#deleteCategoryModal');
            return;
        }

        // Delete the category
        $category->delete();

        $this->dispatch('destroyModal', status: 'warning',  position: 'top', message: 'Category delete successfully.', modal: '#deleteCategoryModal');
    }


    public function closeModal()
    {

        $this->resetInput();
        $this->dispatch('closeModal');
    }

    private function resetInput()
    {
        $this->reset(['name', 'status','photos', 'photos_display']);
    }
}
