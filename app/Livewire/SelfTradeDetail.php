<?php

namespace App\Livewire;

use App\Livewire\Forms\TradingForm;
use App\Models\TradingItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class SelfTradeDetail extends Component
{
    use WithFileUploads;
    public $id;
    public $item;
    public TradingForm $form;
    

    public function removeTrade() {
        $trade = TradingItem::find($this->id);
        $trade->delete();
        $this->redirect('/self-trading');
    }

    public function editTrade() {
        
        $timestamp = time();
        $user = Auth::user();
        $form = $this->form;
        
        $trade = TradingItem::find($this->id);

        if (isset($form->image) == true) {
            $image_name = "trade-".$user->name."-".$user->id."-".$timestamp.".pdf";
            $form->image->storeAs('public/trade', $image_name);
            $trade->image = "storage/trade/".$image_name;
        } 

        $trade->name = isset($form->name) ? $form->name :$trade->name;
        $trade->description = isset($form->description) ? $form->description :$trade->description;
        $trade->condition = isset($form->condition) ? $form->condition :$trade->condition;
        $trade->price = isset($form->price) ? $form->price :$trade->price;
        $trade->education_level =  isset($form->education_level) ? $form->education_level :$trade->education_level;
        $trade->save();
        $this->dispatch("modal:success");
    }

    public function mount($id) {
        $this->id = $id;
        $book = TradingItem::where(['id'=>$id, 'user_id'=>Auth::user()->id])->first();
        
        if (isset($book) == false) {
            return $this->redirect('/self-trading');
        } else {
            $this->item = $book;
        }
    }
    
    public function render()
    {
        $this->item = TradingItem::where(['id'=>$this->id, 'user_id'=>Auth::user()->id])->first();
        return view('livewire.self-trade-detail')->extends('layouts.app')->section('content');
    }
}
