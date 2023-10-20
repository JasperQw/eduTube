<?php

namespace App\Livewire;

use App\Models\Collection;
use App\Models\CommunityNote;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserProfile extends Component
{
    use WithFileUploads;
    public $user;
    public $image;
    public $collections_id;

    public function mount($id) {
        $user = User::find($id);
        if (isset($user) == true) {
            $this->user = $user;
            $this->collections_id = Collection::where(['user_id'=>$id])->pluck('community_note_id');
        } else {
            $this->redirect('/chilling-workplace');
        }
    }
    public function changeImage() {
        if (isset($this->image) == true) {
            $timestamp = time();
            $user = $this->user;
            $ext = $this->image->getClientOriginalExtension();
            $image_name = "tutorial-".$user->name."-".$user->id."-".$timestamp.".".$ext;
            $this->image->storeAs('public/profile-image', $image_name);
            $user->profile_image = "storage/profile-image/".$image_name;
            $user->save();
            $this->image = null;
            $this->dispatch('modal:success');
        } 
    }
    public function render()
    {
        $collections = CommunityNote::whereIn('id', $this->collections_id)->get();
        return view('livewire.user-profile', ['collections'=>$collections])->extends('layouts.app')->section('content');
    }
}
