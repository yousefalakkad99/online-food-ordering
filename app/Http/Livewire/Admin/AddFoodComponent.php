<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Food;
use App\Traits\images;
use Livewire\WithFileUploads;

class AddFoodComponent extends Component
{
    use images;
    use WithFileUploads;
    public $name;
    public $description;
    public $price;
    public $sale;
    public $calories;
    public $category_id;
    public $image;
    public function updated($fields)
    {
        $this->validateonly($fields,[
            'name'=>'required|string',
            'price'=>'required|numeric',
            'sale'=>'numeric',
            'calories'=>'required|numeric',
            'category_id'=>'required',
            'image'=>'required|image|mimes:jpg,jpeg'
        ],
        [
          'name.required'=>'هذا الحقل مطلوب',
          'price.required'=>'هذا الحقل مطلوب',
          'calories.required'=>'هذا الحقل مطلوب',
          'category_id.required'=>'هذا الحقل مطلوب',
          'image.required'=>'هذا الحقل مطلوب',
          'price.numeric'=>'يرجى ادخال ارقام فقط',
          'sale.numeric'=>'يرجى ادخال ارقام فقط',
          'sale.calories'=>'يرجى ادخال ارقام فقط',
          'image.image'=>'يرجى اختيار صورة فقط',
          'image.mimes'=>'يرجى اختيار صورة من نوع :jpg,jpeg'
        ]

    );

    }
    public function add_food()
    {
        $this->validate([
            'name'=>'required|string',
            'price'=>'required|numeric',
            'sale'=>'numeric',
            'calories'=>'required|numeric',
            'category_id'=>'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ],
        [
          'name.required'=>'هذا الحقل مطلوب',
          'price.required'=>'هذا الحقل مطلوب',
          'calories.required'=>'هذا الحقل مطلوب',
          'category_id.required'=>'هذا الحقل مطلوب',
          'image.required'=>'هذا الحقل مطلوب',
          'price.numeric'=>'يرجى ادخال ارقام فقط',
          'sale.numeric'=>'يرجى ادخال ارقام فقط',
          'sale.calories'=>'يرجى ادخال ارقام فقط',
          'image.image'=>'يرجى اختيار صورة فقط',
          'image.mimes'=>'يرجى اختيار صورة من نوع :jpg,jpeg'
        ]
);
        $food=new Food();
        $food->name=$this->name;
        $food->description=$this->description;
        $food->price=$this->price;
        $food->sale=$this->sale;
        $food->calories=$this->calories;
        $food->category_id=$this->category_id;
        $file_name=$this->save_image($this->image,'food');
        $food->image=$file_name;
        $food->save();
        session()->flash('message','تمت اضافة وجية');
    }
    public function render()
    {
        $categories=Category::get();
        return view('livewire.admin.add-food-component',compact('categories'));
    }
}
