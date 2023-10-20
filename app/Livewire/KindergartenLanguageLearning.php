<?php

namespace App\Livewire;

use App\Models\KindergartenLanguage;
use Livewire\Component;

class KindergartenLanguageLearning extends Component
{
    public $type = "";
    public function render()
    {
        $videos = KindergartenLanguage::when($this->type != '', function($q) {
            return $q->where(['type'=>$this->type]);
        })
        ->get();
        return view('livewire.kindergarten-language-learning', ['videos'=>$videos])->extends('layouts.app')->section('content');
    }
}
