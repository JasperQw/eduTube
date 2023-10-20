<?php

namespace App\Livewire;

use App\Livewire\Forms\TradingForm;
use App\Models\TradingItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class SelfTradePage extends Component
{
    use WithFileUploads;
    public TradingForm $form;

    public function addtrade() {
        $timestamp = time();
        $user = Auth::user();
        $form = $this->form;
        
        $trade = new TradingItem();
        if (isset($form->image) == true) {
            $image_name = "trade-".$user->name."-".$user->id."-".$timestamp.".pdf";
            $form->image->storeAs('public/trade', $image_name);
            $trade->image = "storage/trade/".$image_name;
        } 

        $trade->name = $form->name;
        $trade->description = $form->description;
        $trade->condition = $form->condition;
        $trade->price = $form->price;
        $trade->education_level =  $form->education_level;
        $trade->user_id = Auth::user()->id;
        $trade->save();
        $this->dispatch("modal:success");
    }

    public function render()
    {
        $user_id = Auth::user()->id;
        $avails = TradingItem::where(['user_id'=>$user_id,'status'=>'available'])->get();
        $not_avails = TradingItem::where(['user_id'=>$user_id,'status'=>'not_available'])->get();
        return view('livewire.self-trade-page', ['avails'=>$avails, 'not_avails'=>$not_avails])->extends('layouts.app')->section('content');
    }
}
