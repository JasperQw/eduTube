<?php

namespace App\Livewire;

use App\Models\FundraisingRecord;
use Livewire\Component;

class FundraisingView extends Component
{
    public function render()
    {
        $records = FundraisingRecord::all();
        return view('livewire.fundraising-view', ['records' => $records])->extends('layouts.app')->section('content');
    }
}
