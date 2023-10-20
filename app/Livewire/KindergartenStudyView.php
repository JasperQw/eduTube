<?php

namespace App\Livewire;

use Livewire\Component;

class KindergartenStudyView extends Component
{


    public function render()
    {   
        return view('livewire.kindergarten-study-view')->extends('layouts.app')->section('content');
    }
}
