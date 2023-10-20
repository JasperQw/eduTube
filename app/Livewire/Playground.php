<?php

namespace App\Livewire;

use App\Models\GameCollection;
use App\Models\like;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Playground extends Component
{
    public function like($id) {
        $like = new like();
        $like->target_id = $id;
        $like->target_type = GameCollection::class;
        $like->user_id = Auth::user()->id;
        $like->save();

        $any = GameCollection::find($id);
        $any->like += 1;
        $any->save();
    }

    public function render()
    {
        $games = GameCollection::query()->orderBy('like', 'desc')->get();
        return view('livewire.playground', ['games'=>$games])->extends('layouts.app')->section('content');
    }
}
