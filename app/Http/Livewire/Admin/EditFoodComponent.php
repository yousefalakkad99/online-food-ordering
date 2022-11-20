<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Food;
use App\Traits\images;
use Livewire\WithFileUploads;

class EditFoodComponent extends Component
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
    public $new_image;
    public $food_id;

    public function mount($food_id)
    {
        $food=Food::find($food_id);
        $this->food_id=$food->id;
        $this->name=$food->name;
        $this->description=$food->description;
        $this->price=$food->price;
        $this->sale=$food->sale;
        $this->calories=$food->calories;
        $this->category_id=$food->category_id;
        $this->image=$food->image;
    }
     public function updated($fields)
     {
         $this->validateonly($fields,[
             'name'=>'required|string',
             'price'=>'required|numeric',
             'sale'=>'numeric',
             'calories'=>'required|numeric',
             'category_id'=>'required',
            //  'new_image'=>'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
         ],
         [
           'name.required'=>'هذا الحقل مطلوب',
           'price.required'=>'هذا الحقل مطلوب',
           'calories.required'=>'هذا الحقل مطلوب',
           'category_id.required'=>'هذا الحقل مطلوب',
           'new_image.required'=>'هذا الحقل مطلوب',
           'price.numeric'=>'يرجى ادخال ارقام فقط',
           'sale.numeric'=>'يرجى ادخال ارقام فقط',
           'sale.calories'=>'يرجى ادخال ارقام فقط',
           'new_image.image'=>'يرجى اختيار صورة فقط',
           'new_image.mimes'=>'يرجى اختيار صورة من نوع :jpg,jpeg'
         ]

     );

     }
    public function edit_food()
    {

         $this->validate([
             'name'=>'required|string',
             'price'=>'required|numeric',
             'sale'=>'numeric',
             'calories'=>'required|numeric',
             'category_id'=>'required',
            //  'new_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
         ],
         [
           'name.required'=>'هذا الحقل مطلوب',
           'price.required'=>'هذا الحقل مطلوب',
           'calories.required'=>'هذا الحقل مطلوب',
           'category_id.required'=>'هذا الحقل مطلوب',

           'price.numeric'=>'يرجى ادخال ارقام فقط',
           'sale.numeric'=>'يرجى ادخال ارقام فقط',
           'sale.calories'=>'يرجى ادخال ارقام فقط',
           'new_image.image'=>'يرجى اختيار صورة فقط',
           'new_image.mimes'=>'يرجى اختيار صورة من نوع :jpg,jpeg'
         ]
 );

        $food=Food::find($this->food_id);
        $food->name=$this->name;
        $food->description=$this->description;
        $food->price=$this->price;
        if($this->sale == "")
        {
            $food->sale=null;
        }
        else
        {
            $food->sale=$this->sale;
        }

        $food->calories=$this->calories;
        $food->category_id=$this->category_id;
        if($this->new_image)
        {
            $file_name=$this->save_image($this->new_image,'food');
            $food->image=$file_name;
        }
        $food->save();
        session()->flash('message','تم تعديل وجية');
    }



    public function render()
    {
        $categories=Category::get();
        return view('livewire.admin.edit-food-component',compact('categories'));
    }
}
