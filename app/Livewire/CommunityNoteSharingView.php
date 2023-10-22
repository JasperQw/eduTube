<?php

namespace App\Livewire;

use App\Livewire\Forms\CommunityNoteForm;
use App\Models\Collection;
use App\Models\CommunityNote;
use App\Models\like;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CommunityNoteSharingView extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $educationLevel = 'primary';
    public $year = '';
    public $subject='';
    public $major = '';
    public $search = "";
    public $education_level_input = "";
    public $allMajor;
    public $inputMajor;
    public $newMajor;
    public $allSubject;
    public $allSubjectInput;
    public $inputSubject;
    public $newSubject;
    public CommunityNoteForm $form;

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

    public function addCN() {
        $timestamp = time();
        $user = Auth::user();
        $form = $this->form;
        
        $cn = new CommunityNote();
        if (isset($form->note_url) == true) {
            $paper_name = "note-".$user->name."-".$user->id."-".$timestamp.".pdf";
            $form->note_url->storeAs('public/community_note', $paper_name);
            $cn->note_url = "storage/community_note/".$paper_name;
        } 

        $cn->title = $form->title;
        $cn->description = $form->description;
        $cn->education_level = $this->education_level_input;
        if ($this->education_level_input == 'primary' || $this->education_level_input == 'secondary') {
            $cn->year = $form->year;
            $cn->subject = isset($this->newSubject) == true ? str_replace(" ", "_", strtolower($this->newSubject)) : $this->inputSubject;
        } else if ($this->education_level_input == 'university') {
            $cn->major = isset($this->newMajor) == true ? str_replace(" ", "_", strtolower($this->newMajor)) : $this->inputMajor;
        }
        $cn->save();

        $this->dispatch("modal:success");
    }

    public function render()
    {
        $this->allSubject = CommunityNote::where(['education_level'=>$this->educationLevel])->whereNotNull('subject')->select('subject')->distinct()->get();
        $this->allSubjectInput = CommunityNote::where(['education_level'=>$this->education_level_input])->whereNotNull('subject')->select('subject')->distinct()->get();
        $this->allMajor = CommunityNote::whereNotNull('major')->select('major')->distinct()->get();
        $cns = CommunityNote::with(['likes', 'collects'])
        ->where(['education_level' => $this->educationLevel])
        ->when(($this->educationLevel == "primary" || $this->educationLevel == "secondary") && $this->year != "", function($q) {
            return $q->where(['year' => $this->year]);
        })
        ->when($this->educationLevel == "university" && $this->major != "", function ($q) {
            return $q->where(['major'=>$this->major]);
        })
        ->when(($this->educationLevel == "primary" || $this->educationLevel == "secondary") && $this->subject != "", function ($q) {
            return $q->where(['subject'=>$this->subject]);
        })
        ->when($this->search != '', function($q) {
            return $q->where('title', 'LIKE', '%'.$this->search."%");
        })
        ->orderBy('like','desc')
        ->paginate(10);
        
        return view('livewire.community-note-sharing-view', ['cns'=>$cns])->extends('layouts.app')->section('content');
    }
}
