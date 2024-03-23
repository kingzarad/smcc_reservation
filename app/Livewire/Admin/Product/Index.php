<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithFileUploads;

    public $category_id, $name, $slug, $small_description, $description, $quantity, $status, $meta_title, $meta_keyword, $meta_description, $p_id,
        $photos = [], $photos_display = [];

    public function render()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        $products = Product::with('productImages')->orderBy('created_at', 'DESC')->get();
        return view('livewire.admin.product.index', compact('categories', 'products'));
    }

    public function saveProduct()
    {

        $validatedData = $this->validate([
            'category_id' => 'required|integer',
            'name' => 'required|string|min:2',
            'small_description' => 'required|string|min:10',
            'description' => 'required|string|min:10',
            'photos.*' => 'max:3072',
            'photos' => 'required|max:5',
        ], [
            'category_id.required' => 'The category field is required..',
            'photos.required' => 'Please upload at least one photo.',
            'photos.max' => 'You can upload a maximum of 5 photos.',
        ]);

        $existing = Product::where('name', $validatedData['name'])->exists();

        if ($existing) {
            $this->dispatch('saveModal', status: 'warning', position: 'top', message: 'Product already exist.');
            return;
        }

        $category = Category::findOrFail($validatedData['category_id']);

        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['name']),
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'status' => '1',
        ]);


        foreach ($this->photos as $photo) {

            $imagePath = $photo->store('photos', 'public');

            $product->productImages()->create([
                'product_id' => $product->id,
                'image' => $imagePath
            ]);
        }

        // Reset the input fields
        $this->resetInput();
        $this->dispatch('saveModal', status: 'success',  position: 'top', message: 'Product save successfully.');
    }

    public function updateProduct()
    {
        $validatedData = $this->validate([
            'category_id' => 'required|integer',
            'name' => 'required|string|min:2',
            'small_description' => 'required|string|min:10',
            'description' => 'required|string|min:10',
            'photos.*' => 'max:3072',
            'photos' => 'nullable|max:5',
        ], [
            'category_id.required' => 'The category field is required..',
            'photos.max' => 'You can upload a maximum of 5 photos.',
        ]);

        $product = Product::findOrFail($this->p_id);

        $product->update([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['name']),
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description']
        ]);

        // Handle photo update
        if (!empty($this->photos)) {
            // Delete old photo
            if ($product->productImages->isNotEmpty()) {
                foreach ($product->productImages as $image) {
                    Storage::disk('public')->delete($image->image);
                    $image->delete();
                }
            }

            // Upload new photo
            foreach ($this->photos as $photo) {
                $imagePath = $photo->store('photos', 'public');

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $imagePath
                ]);
            }
        }

        $this->dispatch('updateModal', status: 'success', position: 'top', message: 'Product updated successfully.');
    }

    public function editProduct(int $id)
    {
        $product = Product::with('productImages')->find($id);
        if ($product) {
            $this->p_id = $product->id;
            $this->category_id = $product->category_id;
            $this->name = $product->name;
            $this->small_description = $product->small_description;
            $this->description = $product->description;
            $this->status = $product->status == '0' ? true : false;

            // // Pass product images to the modal component
            $this->photos_display = $product->productImages->pluck('image')->toArray();

            $this->dispatch('editModal');
        } else {
            $this->redirect('/admin/resource');
        }
    }


    public function deleteProduct(int $id)
    {
        $this->p_id = $id;
        $this->dispatch('editModal');
    }

    public function destroyProduct()
    {

        $product = Product::find($this->p_id);

        if (!$product) {
            $this->dispatch('destroyModal', status: 'warning', position: 'top', message: 'Product not found!', modal: '#deleteProductModal');
            return;
        }

        // Delete associated images from storage
        foreach ($product->productImages as $image) {
            Storage::disk('public')->delete($image->image);
        }

        // Delete the product
        $product->delete();

        $this->dispatch('destroyModal', status: 'warning',  position: 'top', message: 'Product delete successfully.', modal: '#deleteProductModal');
    }

    public function closeModal()
    {
        $this->resetInput();
        $this->dispatch('closeModal');
    }


    private function resetInput()
    {
        $this->reset(['name', 'category_id', 'small_description', 'description', 'status', 'photos']);
    }
}
