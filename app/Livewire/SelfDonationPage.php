<?php

namespace App\Livewire;

use App\Livewire\Forms\DonationForm;
use App\Models\DonationItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class SelfDonationPage extends Component
{

    use WithFileUploads;
    public DonationForm $form;

    public function addDonation() {
        $timestamp = time();
        $user = Auth::user();
        $form = $this->form;
        
        $trade = new DonationItem();
        if (isset($form->image) == true) {
            $image_name = "trade-".$user->name."-".$user->id."-".$timestamp.".pdf";
            $form->image->storeAs('public/donation', $image_name);
            $trade->image = "storage/donation/".$image_name;
        } 

        $trade->name = $form->name;
        $trade->description = $form->description;
        $trade->condition = $form->condition;
        $trade->education_level =  $form->education_level;
        $trade->user_id = Auth::user()->id;
        $trade->save();
        $this->dispatch("modal:success");
    }

    public function render()
    {
        $user_id = Auth::user()->id;
        $avails = DonationItem::where(['user_id'=>$user_id,'status'=>'available'])->get();
        $not_avails = DonationItem::where(['user_id'=>$user_id,'status'=>'not_available'])->get();
        return view('livewire.self-donation-page', ['avails'=>$avails, 'not_avails'=>$not_avails])->extends('layouts.app')->section('content');
    }
}
