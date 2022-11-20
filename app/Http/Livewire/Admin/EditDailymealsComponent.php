<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\DailyMeal;
use App\Traits\images;
class EditDailymealsComponent extends Component
{
    use images;
    use WithFileUploads;
    public $name;
    public $day;
    public $description;
    public $price;
    public $calories;
    public $image;
    public $new_image;
    public $dailymeal_id;
    public function mount($dailymeal_id)
    {
        $dailymeal=DailyMeal::find($dailymeal_id);
        $this->name=$dailymeal->name;
        $this->day=$dailymeal->day;
        $this->description=$dailymeal->description;
        $this->price=$dailymeal->price;
        $this->calories=$dailymeal->calories;
        $this->image=$dailymeal->image;
        $this->dailymeal_id=$dailymeal->id;
    }
    public function updated($fields)
    {
        $this->validateonly($fields,[
            'name'=>'required|string',
            'day'=>'required|string',
            'description'=>'required',
            'price'=>'required|numeric',
            'new_image'=>'required|image|mimes:jpg,jpeg',
            'calories'=>'required|numeric'
        ],[
            'name.required'=>'هذا الحقل مطلوب',
            'day.required'=>'هذا الحقل مطلوب',
            'price.required'=>'هذا الحقل مطلوب',
            'calories.required'=>'هذا الحقل مطلوب',
            'new_image.required'=>'هذا الحقل مطلوب',
            'description.required'=>'هذا الحقل مطلوب',

            'price.numeric'=>'يرجى ادخال ارقام فقط',
            'calories.numeric'=>'يرجى ادخال ارقام فقط',

            'new_image.image'=>'يرجى اختيار صورة فقط',
            'new_image.mimes'=>'يرجى اختيار صورة من نوع :jpg,jpeg'
          ]);
    }
    public function edit_dailymeal()
    {
        $this->validate([
            'name'=>'required|string',
            'day'=>'required|string',
            'description'=>'required',
            'price'=>'required|numeric',
            // 'new_image'=>'required|image|mimes:jpg,jpeg',
            'calories'=>'required|numeric'
        ],[
            'name.required'=>'هذا الحقل مطلوب',
            'day.required'=>'هذا الحقل مطلوب',
            'price.required'=>'هذا الحقل مطلوب',
            'calories.required'=>'هذا الحقل مطلوب',
            'new_image.required'=>'هذا الحقل مطلوب',
            'description.required'=>'هذا الحقل مطلوب',

            'price.numeric'=>'يرجى ادخال ارقام فقط',
            'calories.numeric'=>'يرجى ادخال ارقام فقط',

            'new_image.image'=>'يرجى اختيار صورة فقط',
            'new_image.mimes'=>'يرجى اختيار صورة من نوع :jpg,jpeg'
          ]);
        $dailymeal=DailyMeal::find($this->dailymeal_id);
        $dailymeal->name=$this->name;
        $dailymeal->day=$this->day;
        $dailymeal->description=$this->description;
        $dailymeal->price=$this->price;
        $dailymeal->calories=$this->calories;
        if($this->new_image)
        {
            $file_name=$this->save_image($this->new_image,'food');
            $dailymeal->image=$file_name;
        }
        $dailymeal->save();
        session()->flash('message','تم التعديل بنجاح');

    }
    public function render()
    {
        return view('livewire.admin.edit-dailymeals-component');
    }
}
