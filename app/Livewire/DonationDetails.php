<?php

namespace App\Livewire;

use App\Models\DonationItem;
use Livewire\Component;

class DonationDetails extends Component
{
    public $id;
    public $item;
    public function mount($id) {
        $this->id = $id;
        $book = DonationItem::with(['user'])->where('id',$id)->first();
        
        if (isset($book) == false) {
            return $this->redirect('/donation');
        } else {
            $this->item = $book;
        }
    }
    
    public function render()
    {
        return view('livewire.donation-details')->extends('layouts.app')->section('content');
    }
}
