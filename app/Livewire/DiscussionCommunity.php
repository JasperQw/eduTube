<?php

namespace App\Livewire;

use App\Livewire\Forms\MeetingsForm;
use App\Models\ChatRoom;
use App\Models\MeetingRoom;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DiscussionCommunity extends Component
{
    public $educationLevel = 'primary';
    public $year = 1;
    public $section='chatroom';
    public $major = 'information_technology';
    public $user_id;
    public $canChat;
    public $message;
    public $allMajor;
    public MeetingsForm $form_meeting;

    public function changeSection($section) {
        $this->section = $section;
    }

    public function mount() {
        $this->educationLevel = Auth::user()->education_level;
    }

    public function rendered()
    {
        return $this->dispatch('scrollToBottom');
    }

    public function addMeetings() {
        $form_meeting = $this->form_meeting;
        $record = new MeetingRoom();
        $record->title = $form_meeting->title;
        $record->start = str_replace("T", " ",$form_meeting->start).":00";
        $record->end = str_replace("T", " ",$form_meeting->end).":00";
        $record->description = $form_meeting->description;
        $record->link = $form_meeting->link;
        $record->user_id = Auth::user()->id;
        $record->education_level = $this->educationLevel;
        if ($this->educationLevel == 'university') {
            $record->major = $this->major;
        } else if ($this->educationLevel != 'pre-u') {
            $record->year = $this->year;
        }
        $record->save();

        $this->dispatch('modal:success');
    }

    public function addMessage() {
        $record = new ChatRoom();
        $record->message = $this->message;
        $record->user_id = $this->user_id;
        $record->education_level = $this->educationLevel;
        if ($this->educationLevel == 'university') {
            $record->major = $this->major;
        } else if ($this->educationLevel != 'pre-u') {
            $record->year = $this->year;
        }

        $record->save();
        
    }
    
    public function render()
    {
     
        $this->user_id = Auth::user()->id;
        $this->canChat = Auth::user()->education_level == $this->educationLevel;
        
        if ($this->section == 'chatroom') {
            $this->allMajor = ChatRoom::whereNotNull('major')->select('major')->distinct()->get();
            $chats = ChatRoom::with(['user'])
            ->where(['education_level' => $this->educationLevel])
            ->when(($this->educationLevel == "primary" || $this->educationLevel == "secondary") && $this->year != "", function($q) {
                return $q->where(['year' => $this->year]);
            })
            ->when($this->educationLevel == "university" && $this->major != "", function ($q) {
                return $q->where(['major'=>$this->major]);
            })
            ->get();
            
            return view('livewire.discussion-community', ['chats'=>$chats])->extends('layouts.app')->section('content');
        } else  {
            $this->allMajor = MeetingRoom::whereNotNull('major')->select('major')->distinct()->get();
            $meetings = MeetingRoom::with(['user'])
            ->where(['education_level' => $this->educationLevel])
            ->when(($this->educationLevel == "primary" || $this->educationLevel == "secondary") && $this->year != "", function($q) {
                return $q->where(['year' => $this->year]);
            })
            ->when($this->educationLevel == "university" && $this->major != "", function ($q) {
                return $q->where(['major'=>$this->major]);
            })
            ->get();
            
            return view('livewire.discussion-community', ['meetings' => $meetings])->extends('layouts.app')->section('content');
        }
        
    }
}
