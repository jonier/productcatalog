<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public $categories;
    public $id;
    public $name;
    public $description;
    public $modal = false;
    public $isUpdateCategory = false;

    public function mount()
    {
        $this->getCategories();
    }

    private function getCategories(){
        $this->categories = Category::all();
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
        $this->id=null;
        $this->name = '';
        $this->description = '';
        $this->isUpdateCategory = false;
    }

    public function createOrUpdateCategory()
    {

        $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        if(!$this->name || !$this->description)
        {
            return;
        }

        if(!$this->id){
            $category = new Category();
            $category->name = $this->name;
            $category->description = $this->description;
            $category->save();

        }else{
            Category::updateOrCreate(['id' => $this->id], [
                'name' => $this->name,
                'description' => $this->description,
            ]);
        }
        $this->clearFields();
        $this->modal = false;
        $this->isUpdateCategory = false;
        $this->getCategories();
    }

    public function updateCategory(Category $category)
    {
        $this->id = $category->id;
        $this->name = $category->name;        
        $this->description = $category->description;
        $this->modal = true;
        $this->isUpdateCategory = true;
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
        $this->getCategories();
    }

    public function render()
    {
        return view('livewire.categories');
    }
}
