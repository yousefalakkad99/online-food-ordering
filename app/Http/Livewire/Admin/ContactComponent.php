<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\contact;

class ContactComponent extends Component
{
    public $phone;
    public $email;
    public $location;
    public $about_us;
    public $facebook;
    public $whatsapp;
    public $snapchat;
    public $instagram;

    public function mount()
    {
        $contact=contact::first();
        if($contact)
        {
            $this->phone=$contact->phone;
            $this->email=$contact->email;
            $this->location=$contact->location;
            $this->about_us=$contact->about_us;
            $this->facebook=$contact->facebook;
            $this->whatsapp=$contact->whatsapp;
            $this->snapchat=$contact->snapchat;
            $this->instagram=$contact->instagram;
        }

    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'phone'=>'required',
            'email'=>'required',
            'location'=>'required',
            'about_us'=>'required',
            'facebook'=>'required',
            'whatsapp'=>'required',
            'instagram'=>'required',
            'snapchat'=>'required',
        ],
    [
        'phone.required'=>'رقم الهاتف مطلوب',
        'email.required'=>' البريد الألكتروني مطلوب',
        'location.required'=>' الموقع مطلوب',
        'about_us.required'=>'من نحن مطلوب',
        'facebook.required'=>' هذا الحقل مطلوب',
        'whatsapp.required'=>'هذا الحقل مطلوب',
        'instagram.required'=>'هذا الحقل مطلوب',
        'snapchat.required'=>'هذا الحقل مطلوب',
    ]);

    }
    public function edit_contact()
    {
        $this->validate([
            'phone'=>'required',
            'email'=>'required',
            'location'=>'required',
            'about_us'=>'required',
            'facebook'=>'required',
            'whatsapp'=>'required',
            'instagram'=>'required',
            'snapchat'=>'required',
        ],
    [
        'phone.required'=>'رقم الهاتف مطلوب',
        'email.required'=>' البريد الألكتروني مطلوب',
        'location.required'=>' الموقع مطلوب',
        'about_us.required'=>'من نحن مطلوب',
        'facebook.required'=>' هذا الحقل مطلوب',
        'whatsapp.required'=>'هذا الحقل مطلوب',
        'instagram.required'=>'هذا الحقل مطلوب',
        'snapchat.required'=>'هذا الحقل مطلوب',
    ]);
        $contact=contact::first();
        if($contact)
        {
            $contact->phone=$this->phone;
            $contact->email=$this->email;
            $contact->location=$this->location;
            $contact->about_us=$this->about_us;
            $contact->facebook=$this->facebook;
            $contact->whatsapp=$this->whatsapp;
            $contact->snapchat=$this->snapchat;
            $contact->instagram=$this->instagram;
            $contact->save();
            session()->flash('message','تم تعديل بيانات الأتصال بنجاح');
        }
        else
        {
            $contact=new contact();
            $contact->phone=$this->phone;
            $contact->email=$this->email;
            $contact->location=$this->location;
            $contact->about_us=$this->about_us;
            $contact->facebook=$this->facebook;
            $contact->whatsapp=$this->whatsapp;
            $contact->snapchat=$this->snapchat;
            $contact->instagram=$this->instagram;
            $contact->save();
            session()->flash('message','تم أضافة بيانات الأتصال بنجاح');
        }

    }
    public function render()
    {
        return view('livewire.admin.contact-component');
    }
}
