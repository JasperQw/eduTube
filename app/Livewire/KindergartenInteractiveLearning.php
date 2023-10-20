<?php

namespace App\Livewire;

use App\Models\KindergartenInteractive;
use Livewire\Component;

class KindergartenInteractiveLearning extends Component
{
    public $type = "";
    public function render()
    {
        $videos = KindergartenInteractive::when($this->type != '', function($q) {
            return $q->where(['type'=>$this->type]);
        })
        ->get();
        return view('livewire.kindergarten-interactive-learning', ['videos'=>$videos])->extends('layouts.app')->section('content');
    }
}
