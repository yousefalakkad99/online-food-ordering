<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Food;
use Livewire\WithPagination;

class FoodComponent extends Component
{
    public function delete_food($id)
    {
        $food=Food::find($id);
        $food->delete();
        session()->flash('message','تم حذف الوجبة بنجاح');

    }
    public function render()
    {
        $foods=Food::paginate(12);
        return view('livewire.admin.food-component',compact('foods'));
    }
}
