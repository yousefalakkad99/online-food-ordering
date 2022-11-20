<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class CategoryComponent extends Component
{
    public function Delete_category($id)
    {
        $Category=Category::find($id);
        $Category->delete();
        session()->flash('message','تم حذف الصنف بنجاح');

    }
    public function render()
    {
        $categories=Category::paginate(5);
        return view('livewire.admin.category-component',compact('categories'));
    }
}
