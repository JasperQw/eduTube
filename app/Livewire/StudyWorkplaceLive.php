<?php

namespace App\Livewire;

use Livewire\Component;

class StudyWorkplaceLive extends Component
{
    public function render()
    {
        return view('livewire.study-workplace-live')->extends('layouts.app')->section('content');
    }
}
