<?php

namespace App\Livewire;

use App\Models\GuestLecture;
use App\Models\like;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GuestLectureView extends Component
{
    public $video;
    public $id;
    public function like($id) {
        $like = new like();
        $like->target_id = $id;
        $like->target_type = GuestLecture::class;
        $like->user_id = Auth::user()->id;
        $like->save();

        $any = GuestLecture::find($id);
        $any->like += 1;
        $any->save();
    }

    public function mount($id) {
        $this->id = $id;
        $video = GuestLecture::with(['likes'])->where('id', $id)->first();
        if (isset($video) == true) {
            $this->video = $video;
        } else {
            $this->redirect('/study-workplace/primary-secondary');
        }
    }

    public function render()
    {
        $this->video = GuestLecture::with(['likes'])->where('id', $this->id)->first();
        return view('livewire.guest-lecture-view')->extends('layouts.app')->section('content');
    }
}
