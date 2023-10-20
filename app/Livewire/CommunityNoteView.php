<?php

namespace App\Livewire;

use App\Models\Collection;
use App\Models\CommunityNote;
use App\Models\like;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommunityNoteView extends Component
{
    public $note;
    public $id;

    public function like($id) {
        $like = new like();
        $like->target_id = $id;
        $like->target_type = CommunityNote::class;
        $like->user_id = Auth::user()->id;
        $like->save();

        $cn = CommunityNote::find($id);
        $cn->like += 1;
        $cn->save();
    }

    public function collect($id) {
        $collect = new Collection();
        $collect->user_id = Auth::user()->id;
        $collect->community_note_id = $id;
        $collect->save();
    }

    public function mount($id) {
        $this->id = $id;
        $note = CommunityNote::with(['likes', 'collects'])->where('id', $id)->first();
        if (isset($note) == true) {
            $this->note = $note;
        } else {
            $this->redirect('/study-workplace/primary-secondary/community-note-sharing');
        }
    }

    public function render()
    {
        $this->note = CommunityNote::with(['likes', 'collects'])->where('id', $this->id)->first();
        return view('livewire.community-note-view')->extends('layouts.app')->section('content');
    }
}
