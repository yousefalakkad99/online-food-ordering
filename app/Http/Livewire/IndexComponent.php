<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DailyMeal;
use App\Models\Category;
use App\Models\Food;
use App\Models\Gallary;
use App\Models\contact;
use Livewire\WithPagination;

class IndexComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $dailymeals=DailyMeal::get();
        $categories=Category::get();
        $gallaries=Gallary::get();
        $foods=Food::get();
        $contact=contact::first();
        return view('livewire.index-component',compact('dailymeals','categories','foods','gallaries','contact'));
    }
}
