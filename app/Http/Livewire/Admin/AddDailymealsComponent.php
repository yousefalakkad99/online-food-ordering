<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\DailyMeal;
use App\Traits\images;

class AddDailymealsComponent extends Component
{
    use images;
    use WithFileUploads;
    public $name;
    public $day;
    public $description;
    public $price;
    public $calories;
    public $image;
    public function updated($fields)
    {
        $this->validateonly($fields,[
            'name'=>'required|string',
            'day'=>'required|string',
            'description'=>'required',
            'price'=>'required|numeric',
            'image'=>'required|image|mimes:jpg,jpeg',
            'calories'=>'required|numeric'
        ],[
            'name.required'=>'هذا الحقل مطلوب',
            'day.required'=>'هذا الحقل مطلوب',
            'price.required'=>'هذا الحقل مطلوب',
            'calories.required'=>'هذا الحقل مطلوب',
            'image.required'=>'هذا الحقل مطلوب',
            'description.required'=>'هذا الحقل مطلوب',

            'price.numeric'=>'يرجى ادخال ارقام فقط',
            'calories.numeric'=>'يرجى ادخال ارقام فقط',

            'image.image'=>'يرجى اختيار صورة فقط',
            'image.mimes'=>'يرجى اختيار صورة من نوع :jpg,jpeg'
          ]);

    }
    public function add_dailymeal()
    {
        $this->validate([
            'name'=>'required|string',
            'day'=>'required|string',
            'description'=>'required',
            'price'=>'required|numeric',
            'image'=>'required|image|mimes:jpg,jpeg',
            'calories'=>'required|numeric'
        ],[
            'name.required'=>'هذا الحقل مطلوب',
            'day.required'=>'هذا الحقل مطلوب',
            'price.required'=>'هذا الحقل مطلوب',
            'calories.required'=>'هذا الحقل مطلوب',
            'image.required'=>'هذا الحقل مطلوب',
            'description.required'=>'هذا الحقل مطلوب',

            'price.numeric'=>'يرجى ادخال ارقام فقط',
            'calories.numeric'=>'يرجى ادخال ارقام فقط',

            'image.image'=>'يرجى اختيار صورة فقط',
            'image.mimes'=>'يرجى اختيار صورة من نوع :jpg,jpeg'
          ]);


        $dailymeal=new DailyMeal();
        $dailymeal->name=$this->name;
        $dailymeal->day=$this->day;
        $dailymeal->description=$this->description;
        $dailymeal->price=$this->price;
        $dailymeal->calories=$this->calories;
        $file_name=$this->save_image($this->image,'food');
        $dailymeal->image=$file_name;
        $dailymeal->save();
        session()->flash('message','تمت اضافة وجية');
    }
    public function render()
    {
        return view('livewire.admin.add-dailymeals-component');
    }
}
