<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Gallary;

class GallaryComponent extends Component
{
    public function Delete_image($id)
    {
        $image=Gallary::find($id);
        $image->delete();
        session()->flash('message','تم حذف الصورة بنجاح');

    }
    public function render()
    {
        $gallaries=Gallary::paginate(12);
        return view('livewire.admin.gallary-component',compact('gallaries'));
    }
}
