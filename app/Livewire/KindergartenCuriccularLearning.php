<?php

namespace App\Livewire;

use App\Models\KindergartenCuriccular;
use Livewire\Component;

class KindergartenCuriccularLearning extends Component
{
    public $type = "";
    public function render()
    {
        $videos = KindergartenCuriccular::when($this->type != '', function($q) {
            return $q->where(['type'=>$this->type]);
        })
        ->get();
        return view('livewire.kindergarten-curiccular-learning', ['videos'=>$videos])->extends('layouts.app')->section('content');
    }
}
