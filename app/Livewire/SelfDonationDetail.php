<?php

namespace App\Livewire;

use App\Livewire\Forms\DonationForm;
use App\Models\DonationItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class SelfDonationDetail extends Component
{
    use WithFileUploads;
    public $id;
    public $item;

    public DonationForm $form;
    

    public function removeDonation() {
        $trade = DonationItem::find($this->id);
        $trade->delete();
        $this->redirect('/self-donation');
    }

    public function editDonation() {
        
        $timestamp = time();
        $user = Auth::user();
        $form = $this->form;
        
        $trade = DonationItem::find($this->id);

        if (isset($form->image) == true) {
            $image_name = "donation-".$user->name."-".$user->id."-".$timestamp.".pdf";
            $form->image->storeAs('public/donation', $image_name);
            $trade->image = "storage/donation/".$image_name;
        } 

        $trade->name = isset($form->name) ? $form->name :$trade->name;
        $trade->description = isset($form->description) ? $form->description :$trade->description;
        $trade->condition = isset($form->condition) ? $form->condition :$trade->condition;        
        $trade->education_level =  isset($form->education_level) ? $form->education_level :$trade->education_level;
        $trade->save();
        $this->dispatch("modal:success");
    }

    public function mount($id) {
        $this->id = $id;
        $book = DonationItem::where(['id'=>$id, 'user_id'=>Auth::user()->id])->first();
        
        if (isset($book) == false) {
            return $this->redirect('/self-donation');
        } else {
            $this->item = $book;
        }
    }
    
    public function render()
    {
        $this->item = DonationItem::where(['id'=>$this->id, 'user_id'=>Auth::user()->id])->first();
        return view('livewire.self-donation-detail')->extends('layouts.app')->section('content');
    }
}
