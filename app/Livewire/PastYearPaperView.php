<?php

namespace App\Livewire;

use App\Livewire\Forms\PastYearForm;
use App\Models\like;
use App\Models\PastYearPaper;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class PastYearPaperView extends Component
{
    use WithFileUploads;
    use WithPagination;
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
    public PastYearForm $form;

    public function like($id) {
        $like = new like();
        $like->target_id = $id;
        $like->target_type = PastYearPaper::class;
        $like->user_id = Auth::user()->id;
        $like->save();

        $py = PastYearPaper::find($id);
        $py->like += 1;
        $py->save();
    }

    public function addPY() {
        $timestamp = time();
        $user = Auth::user();
        $form = $this->form;
        
        $py = new PastYearPaper();
        if (isset($form->paper_url) == true) {
            $paper_name = "paper-".$user->name."-".$user->id."-".$timestamp.".pdf";
            $form->paper_url->storeAs('public/past_year', $paper_name);
            $py->paper_url = "storage/past_year/".$paper_name;
        } 
        if (isset($form->answer_url) == true) {
            $answer_name = "answer-".$user->name."-".$user->id."-".$timestamp.".pdf";
            $form->answer_url->storeAs('public/past_year', $answer_name);
            $py->answer_url = "storage/past_year/".$answer_name;
        } 
        $py->title = $form->title;
        $py->description = $form->description;
        $py->education_level = $this->education_level_input;
        if ($this->education_level_input == 'primary' || $this->education_level_input == 'secondary') {
            $py->year = $form->year;
            $py->subject = isset($this->newSubject) == true ? str_replace(" ", "_", strtolower($this->newSubject)) : $this->inputSubject;
        } else if ($this->education_level_input == 'university') {
            $py->major = isset($this->newMajor) == true ? str_replace(" ", "_", strtolower($this->newMajor)) : $this->inputMajor;
        }
        $py->save();

        $this->dispatch("modal:success");
    }

    public function render()
    {
        $this->allSubject = PastYearPaper::where(['education_level'=>$this->educationLevel])->whereNotNull('subject')->select('subject')->distinct()->get();
        $this->allSubjectInput = PastYearPaper::where(['education_level'=>$this->education_level_input])->whereNotNull('subject')->select('subject')->distinct()->get();
        $this->allMajor = PastYearPaper::whereNotNull('major')->select('major')->distinct()->get();
        $pys = PastYearPaper::with(['likes'])
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
        return view('livewire.past-year-paper-view', ['pys'=>$pys])->extends('layouts.app')->section('content');
    }
}
