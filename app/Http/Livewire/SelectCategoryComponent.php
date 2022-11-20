<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DailyMeal;
use App\Models\Category;
use App\Models\Food;
use App\Models\Gallary;
use App\Models\contact;
use Livewire\WithPagination;

class SelectCategoryComponent extends Component
{
    use WithPagination;
    public $category_id;
    public $category_name;
    public function mount($category_id)
    {
        $this->category_id=$category_id;
        $category=Category::find($this->category_id);
        $this->category_name=$category->name;

    }
    public function render()
    {
        $categories=Category::get();
        $dailymeals=DailyMeal::get();
        $gallaries=Gallary::get();
        $contact=contact::first();
        $foods=Food::where('category_id',$this->category_id)->get();
        return view('livewire.select-category-component',compact('dailymeals','categories','foods','gallaries','contact'));
    }
}
