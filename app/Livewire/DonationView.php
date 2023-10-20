<?php

namespace App\Livewire;

use App\Models\DonationItem;
use Livewire\Component;

class DonationView extends Component
{
    public $education_level = "";
    public $search = "";
    
    public function render()
    {
        $items = DonationItem::with(['user'])
        ->when($this->education_level != '', function ($q) {
            return $q->where(['education_level'=>$this->education_level]);
        })
        ->when($this->search != "", function ($q) {
            return $q->where('name', 'LIKE', '%'.$this->search.'%');
        })
        ->where(['status'=>"available"])
        ->get();

        return view('livewire.donation-view', ['items'=>$items])->extends('layouts.app')->section('content');
    }
}
