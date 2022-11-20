<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
class EditCategoryComponent extends Component
{
    public $name;
    public $category_id;

    public function mount($category_id)
    {
        $this->category_id=$category_id;
        $category=Category::find($this->category_id);
        $this->name=$category->name;
    }
    public function updated($fields)
    {
        $this->validateonly($fields,[
            'name'=>'required|unique:categories',

        ],[
            'name.required'=>'هذا الحقل مطلوب',
            'name.unique'=>'هذا  الصنف موجود'
        ]);

    }



    public function edit_category()
    {
        $this->validate([
            'name'=>'required|unique:categories',

        ],[
            'name.required'=>'هذا الحقل مطلوب',
            'name.unique'=>'هذا  الصنف موجود'
        ]);
        $category=Category::find($this->category_id);
        $category->name=$this->name;
        $category->save();
        session()->flash('message','تم تعديل الصنف بنجاح!');



    }
    public function render()
    {
        return view('livewire.admin.edit-category-component');
    }
}
