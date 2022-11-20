<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
class AddCategoryComponent extends Component
{
    public $name;

    public function updated($fields)
    {
        $this->validateonly($fields,[
            'name'=>'required|unique:categories',

        ],[
            'name.required'=>'هذا الحقل مطلوب',
            'name.unique'=>'هذا  الصنف موجود'
        ]);

    }
    public function add_category()
    {
        $this->validate([
            'name'=>'required|unique:categories',

        ],[
            'name.required'=>'هذا الحقل مطلوب',
            'name.unique'=>'هذا  الصنف موجود'
        ]);
        $category=new Category();
        $category->name=$this->name;
        $category->save();
        session()->flash('message','تمت اضافة صنف بنجاح');


    }


    public function render()
    {
        return view('livewire.admin.add-category-component');
    }
}
