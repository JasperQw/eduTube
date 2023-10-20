<?php

namespace App\Livewire;

use App\Models\TradingItem;
use Livewire\Component;

class TradingDetails extends Component
{   
    public $id;
    public $item;
    public function mount($id) {
        $this->id = $id;
        $book = TradingItem::with(['user'])->where('id',$id)->first();
        
        if (isset($book) == false) {
            return $this->redirect('/trading');
        } else {
            $this->item = $book;
        }
    }
    
    public function render()
    {

        return view('livewire.trading-details')->extends('layouts.app')->section('content');
    }
}
