<?php

namespace App\Livewire;

use App\Models\FinancialAid;
use Livewire\Component;
use Livewire\WithPagination;

class FinancialAids extends Component
{
    use WithPagination;
    public $educationalLevel = "primary";
    
    public function render()
    {
        $scholarships = FinancialAid::where(['type'=> 'scholarship'])->paginate(10);
        $loans = FinancialAid::where(['type'=> 'loan'])->paginate(10);
        return view('livewire.financial-aids', ['scholarships'=>$scholarships, 'loans'=>$loans])->extends('layouts.app')->section('content');
    }
}
