<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $products; 
    public $categories; 

    public $id;
    public $name;
    public $description;
    public $price;
    public $image;
    public $category_id;

    public $modal = false;
    public $isUpdateProduct = false;

    public function mount() {
        $this->categories = Category::all();
        $this->getProducts();
    }

    private function getProducts(){
        $this->products = Product::all();
    }

    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    private function clearFields()
    {
        $this->id = null;
        $this->category_id = null;
        $this->name = '';
        $this->description = '';
        $this->price = 0;
        $this->image = '';
        $this->isUpdateProduct = false;
    }

    public function createOrUpdateProduct()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);

        if(!$this->name || !$this->description || !$this->category_id || !$this->price || !$this->image)
        {
            return;
        }

        if(!$this->id){
            $product = new Product();
            $product->name = $this->name;
            $product->description = $this->description;
            $product->category_id = 1; //$this->category_id;
            $product->price = $this->price;
            $product->image = $this->image;
            $product->save();

        }else{
            Product::updateOrCreate(['id' => $this->id], [
                'name' => $this->name,
                'description' => $this->description,
                'category_id' => $this->category_id,
                'price' => $this->price,
                'image' => $this->image,
            ]);
        }

        $this->clearFields();
        $this->modal = false;
        $this->isUpdateProduct = false;
        $this->getProducts();
    }


    public function updateProduct(Product $product)
    {        

        $this->id = $product->id;
        $this->name = $product->name;      
        $this->description = $product->description;
        $this->category_id = $product->category_id;
        $this->price = $product->price;
        $this->image = $product->image;
        $this->modal = true;
        $this->isUpdateProduct = true;
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
        $this->getProducts();
    }

    public function render()
    {
        return view('livewire.products');
    }
}
