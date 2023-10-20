<?php

namespace App\Livewire;

use App\Models\CrashCourse;
use App\Models\like;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CrashCourseView extends Component
{
    public $video;
    public $id;
    public function like($id) {
        $like = new like();
        $like->target_id = $id;
        $like->target_type = CrashCourse::class;
        $like->user_id = Auth::user()->id;
        $like->save();

        $any = CrashCourse::find($id);
        $any->like += 1;
        $any->save();
    }

    public function mount($id) {
        $this->id = $id;
        $video = CrashCourse::with(['likes'])->where('id',$id)->first();
        if (isset($video) == true) {
            $this->video = $video;
        } else {
            $this->redirect('/study-workplace/primary-secondary');
        }
    }

    public function render()
    {
        $this->video = CrashCourse::with(['likes'])->where('id',$this->id)->first();
        return view('livewire.crash-course-view')->extends('layouts.app')->section('content');
    }
}
