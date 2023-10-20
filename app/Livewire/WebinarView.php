<?php

namespace App\Livewire;

use App\Models\like;
use App\Models\Webminar;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WebinarView extends Component
{
    public $video;
    public $id;

    public function like($id) {
        $like = new like();
        $like->target_id = $id;
        $like->target_type = Webminar::class;
        $like->user_id = Auth::user()->id;
        $like->save();

        $any = Webminar::find($id);
        $any->like += 1;
        $any->save();
    }


    public function mount($id) {
        $this->id = $id;
        $video = Webminar::when(['likes'])->where('id',$id)->first();
        if (isset($video) == true) {
            $this->video = $video;
        } else {
            $this->redirect('/study-workplace/primary-secondary');
        }
    }

    public function render()
    {
        $this->video = Webminar::when(['likes'])->where('id',$this->id)->first();
        return view('livewire.webinar-view')->extends('layouts.app')->section('content');
    }
}
