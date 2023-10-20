<?php

namespace App\Livewire;

use App\Models\like;
use App\Models\PastYearPaper;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PastYearView extends Component
{
    public $note;
    public $answer = false;
    public $id;

    public function like($id) {
        $like = new like();
        $like->target_id = $id;
        $like->target_type = PastYearPaper::class;
        $like->user_id = Auth::user()->id;
        $like->save();

        $py = PastYearPaper::find($id);
        $py->like += 1;
        $py->save();
    }

    public function changeAnswerView() {
        $this->answer = !$this->answer;
        
    }

    public function mount($id) {
        $this->id = $id;
        $note = PastYearPaper::with(['likes'])->where('id', $id)->first();
        if (isset($note) == true) {
            $this->note = $note;
        } else {
            $this->redirect('/study-workplace/primary-secondary/past-year-paper');
        }
    }

    public function render()
    {
        $this->note = PastYearPaper::with(['likes'])->where('id', $this->id)->first();
        return view('livewire.past-year-view')->extends('layouts.app')->section('content');
    }
}
