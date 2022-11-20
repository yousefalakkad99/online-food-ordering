<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Gallary;
use App\Traits\images;
class AddGallaryComponent extends Component
{
    use images;
    use WithFileUploads;
    public $image;
    public function updated($fields)
    {
        $this->validateonly($fields,[

            'image'=>'required|image|mimes:jpg,jpeg',

        ],[

            'image.required'=>'هذا الحقل مطلوب',
            'image.image'=>'يرجى اختيار صورة فقط',
            'image.mimes'=>'يرجى اختيار صورة من نوع :jpg,jpeg'
          ]);

    }
    public function add_gallary()
    {
        $this->validate([
            'image'=>'required|image|mimes:jpg,jpeg',

        ],[

            'image.required'=>'هذا الحقل مطلوب',
            'image.image'=>'يرجى اختيار صورة فقط',
            'image.mimes'=>'يرجى اختيار صورة من نوع :jpg,jpeg'
          ]);

        $gallaries=new Gallary();
        $file_name=$this->save_image($this->image,'gallary');
        $gallaries->image=$file_name;
        $gallaries->save();
        session()->flash('message','تمت اضافة صورة الى معرض الصور');
    }
    public function render()
    {

        return view('livewire.admin.add-gallary-component');
    }
}
