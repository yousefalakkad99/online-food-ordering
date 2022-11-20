<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\DailyMeal;
use Livewire\WithPagination;
class DailymealsComponent extends Component
{
    public function Delete_dailymeal($id)
    {
        $dailymeal=DailyMeal::find($id);
        $dailymeal->delete();
        session()->flash('message','تم حذف الوجبة بنجاح');

    }
    public function render()
    {
        $daily_meal=DailyMeal::paginate(5);
        return view('livewire.admin.dailymeals-component',compact('daily_meal'));
    }
}
