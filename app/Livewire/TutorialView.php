<?php

namespace App\Livewire;

use App\Models\like;
use App\Models\StudyWorkplaceTutorial;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TutorialView extends Component
{
    public $note;
    public $id;
    public function like($id) {
        $like = new like();
        $like->target_id = $id;
        $like->target_type = StudyWorkplaceTutorial::class;
        $like->user_id = Auth::user()->id;
        $like->save();

        $any = StudyWorkplaceTutorial::find($id);
        $any->like += 1;
        $any->save();
    }

    public function mount($id) {
        $this->id = $id;
        $note = StudyWorkplaceTutorial::with(['likes'])->where('id', $id)->first();
        if (isset($note) == true) {
            $this->note = $note;
        } else {
            $this->redirect('/study-workplace/primary-secondary');
        }
    }

    public function render()
    {
        $this->note = StudyWorkplaceTutorial::with(['likes'])->where('id', $this->id)->first();
        return view('livewire.tutorial-view')->extends('layouts.app')->section('content');
    }
}
