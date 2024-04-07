<?php

namespace App\Livewire\Admin\Stocks\StockIn;

use App\Models\Product;
use App\Models\StockEntry;
use DateTime;
use Livewire\Component;

class Index extends Component
{
    public $product_id, $stockref,  $stockby, $stockdate, $quantity, $s_id, $btn_stat = false;
    public $quantities = [];

    public function mount()
    {
        $this->srender();
    }

    public function srender()
    {
        $stockinList = StockEntry::where('status', 'pending')->orderBy('created_at', 'DESC')->first();
        if ($stockinList) {
            $this->stockref = $stockinList['stockref'];
            $this->stockby = $stockinList['stock_by'];
            $this->stockdate = $stockinList['entry_date'];


            $this->quantities = $stockinList->pluck('id', 'product_id')->map(function ($id, $productId) {
                return [$productId . '-' . $id => 0];
            })->collapse()->toArray();

            $this->btn_stat = true;
        } else {
            $this->quantities = [];
        }
    }

    public function render()
    {
        $products = Product::with('productImages')->orderBy('created_at', 'DESC')->get();
        $stockinList = StockEntry::with('product')
            ->where('status', 'pending')
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('livewire.admin.stocks.stock-in.index', ['products' => $products, 'stockinList' => $stockinList]);
    }

    public function closeModal()
    {

        $this->dispatch('closeModal');
    }

    public function removeStockProduct($id){

        $stock = StockEntry::find($id);
        // dd($stock);
        $stock->delete();
        $this->dispatch('saveModal', status: 'success', position: 'top', message: 'Stocks remove successfully.');

    }
    public function saveStock()
    {
        foreach ($this->quantities as $key => $quantity) {
            $ids = explode('-', $key);
            $productId = $ids[0];
            $stockEntryId = $ids[1];
            $stockEntry = StockEntry::findOrFail($stockEntryId);

            $product = Product::findOrFail($productId);
            $existingQuantity = $product->quantity;

            $newQuantity = $existingQuantity + $quantity;

            $product->update([
                'quantity' => $newQuantity,
                'status' => 0
            ]);

            $stockEntry->update([
                'quantity' => $quantity,
                'status' => 'completed',
            ]);
        }
        $this->btn_stat = false;
        $this->resetInput();
        $this->dispatch('saveModal', status: 'success', position: 'top', message: 'Stocks added successfully.');
    }

    public function generateRef()
    {

        $this->stockref = $this->getTransNo();

        $this->dispatch('closeModal');
    }

    public function getTransNo()
    {
        try {
            $sdate = date("Ymd");
            $transno = StockEntry::select('stockref')
                ->where('stockref', 'like', '%' . $sdate . '%')
                ->orderByDesc('id')
                ->first();

            if ($transno) {
                $count = intval(substr($transno->stockref, 11, 4));
                $label_transno = "REF" . $sdate . ($count + 1);
            } else {
                $label_transno = "REF" . $sdate . "1001";
            }

            return $label_transno;
        } catch (\Exception $ex) {
            // Log or handle the exception as needed
            return $ex->getMessage();
        }
    }


    public function addStockProduct($id, $quantity)
    {
        // Check if the product already exists in pending status
        $existing = StockEntry::where('product_id', $id)->where('status', 'pending')->exists();

        if ($existing) {
            $this->dispatch('saveModal', status: 'warning', position: 'top', message: 'Product already exists in pending status.');
            return false;
        }

        if (empty($this->stockby) && empty($this->stockdate) && empty($this->stockref)) {
            $this->dispatch('saveModal', status: 'warning', position: 'top', message: 'Reference # and other details are required.');
            return false;
        } else {
            $stockData = [
                'quantity' => 0,
                'product_id' => $id,
                'entry_date' => $this->stockdate,
                'stockref' => $this->stockref,
                'stock_by' => $this->stockby,
                'status' => 'pending'
            ];

            StockEntry::create($stockData);
            $this->btn_stat = true;
            $this->srender();
            $this->dispatch('saveModal', status: 'success', position: 'top', message: 'Product added successfully.');
        }
    }
    private function resetInput()
    {
        $this->reset(['product_id', 'quantity', 'stockby', 'stockdate', 'stockref']);
    }
}
