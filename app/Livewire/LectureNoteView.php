<?php

namespace App\Livewire;

use App\Models\like;
use App\Models\StudyWorkplaceNote;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LectureNoteView extends Component
{
    public $note;
    public $id;
    public function like($id) {
        $like = new like();
        $like->target_id = $id;
        $like->target_type = StudyWorkplaceNote::class;
        $like->user_id = Auth::user()->id;
        $like->save();

        $any = StudyWorkplaceNote::find($id);
        $any->like += 1;
        $any->save();
    }

    public function mount($id) {
        $this->id = $id;
        $note = StudyWorkplaceNote::with(['likes'])->where('id', $id)->first();
        if (isset($note) == true) {
            $this->note = $note;
        } else {
            $this->redirect('/study-workplace/primary-secondary');
        }
    }
    public function render()
    {
        $this->note = StudyWorkplaceNote::with(['likes'])->where('id', $this->id)->first();
        return view('livewire.lecture-note-view')->extends('layouts.app')->section('content');
    }
}
