<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{
    public $categories;
    public $selectedCategory = null;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        $products = Product::all();
        return view('livewire.product-list', [
            'products' => $products,
            'categories' => $this->categories
        ]);
    }
}
