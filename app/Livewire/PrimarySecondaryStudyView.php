<?php

namespace App\Livewire;

use App\Livewire\Forms\CrashCourseForm;
use App\Livewire\Forms\LectureNoteForm;
use App\Livewire\Forms\TutorialForm;
use App\Livewire\Forms\WebinarForm;
use App\Models\CrashCourse;
use App\Models\GuestLecture;
use App\Models\like;
use App\Models\StudyWorkplaceNote;
use App\Models\StudyWorkplaceTutorial;
use App\Models\Webminar;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class PrimarySecondaryStudyView extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $educationLevel = '';
    public $year = '';
    public $section='cc';
    public $major = '';
    public $search = "";
    public $type = "";
    public $education_level_input = "";
    public $allMajor;
    public $inputMajor;
    public $newMajor;
    public CrashCourseForm $form_cc;
    public WebinarForm $form_webinar;
    public CrashCourseForm $form_gl;
    public LectureNoteForm $form_ln;
    public TutorialForm $form_tutorial;

    public function like($id) {
        $like = new like();
        $like->target_id = $id;
        if ($this->section == "cc") {
            $like->target_type = CrashCourse::class;
            $any = CrashCourse::find($id);
        } else if ($this->section == "webinars") {
            $like->target_type = Webminar::class;
            $any = Webminar::find($id);
        } else if ($this->section == "ln") {
            $like->target_type = StudyWorkplaceNote::class;
            $any = StudyWorkplaceNote::find($id);
        } else if ($this->section == "tutorials") {
            $like->target_type = StudyWorkplaceTutorial::class;
            $any = StudyWorkplaceTutorial::find($id);
        } else {
            $like->target_type = GuestLecture::class;
            $any = GuestLecture::find($id);
        }
        
        $like->user_id = Auth::user()->id;
        $like->save();

        $any->like += 1;
        $any->save();
    }

    public function changeSection($section) {
        $this->section = $section;
        $this->type  = "";
    }

    public function changeType($type) {
        $this->type = $type;
    }

    public function addGL() {
        $form_gl = $this->form_gl;
        $gl = new GuestLecture();
        $gl->title = $form_gl->title;
        $gl->description = $form_gl->description;
        $gl->yt_code = $form_gl->yt_code;
        $gl->education_level = $this->education_level_input;
        if ($this->education_level_input == 'primary' || $this->education_level_input == 'secondary') {
            $gl->year = $form_gl->year;
        } else if ($this->education_level_input == 'university') {
            $gl->major = isset($this->newMajor) == true ? str_replace(" ", "_", strtolower($this->newMajor)) : $this->inputMajor;
        }

        $gl->save();

        $this->dispatch("modal:success", ['type'=> "guest lecture video"]);
    }

    public function addLN() {
        $timestamp = time();
        $user = Auth::user();
        $form_ln = $this->form_ln;
        
        $ln = new StudyWorkplaceNote();
        if (isset($form_ln->note_url) == true) {
            $paper_name = "lecture-note-".$user->name."-".$user->id."-".$timestamp.".pdf";
            $form_ln->note_url->storeAs('public/lecture_note', $paper_name);
            $ln->note_url = "storage/lecture_note/".$paper_name;
        } 

        $ln->title = $form_ln->title;
        $ln->description = $form_ln->description;
        $ln->education_level = $this->education_level_input;
        if ($this->education_level_input == 'primary' || $this->education_level_input == 'secondary') {
            $ln->year = $form_ln->year;
        } else if ($this->education_level_input == 'university') {
            $ln->major = isset($this->newMajor) == true ? str_replace(" ", "_", strtolower($this->newMajor)) : $this->inputMajor;
        }
        $ln->save();
        $this->dispatch("modal:success", ['type'=> "lecture note"]);
    }

    public function addTutorial() {
        $timestamp = time();
        $user = Auth::user();
        $form_tutorial = $this->form_tutorial;
        
        $tutorial = new StudyWorkplaceTutorial();
        if (isset($form_tutorial->tutorial_url) == true) {
            $paper_name = "tutorial-".$user->name."-".$user->id."-".$timestamp.".pdf";
            $form_tutorial->tutorial_url->storeAs('public/tutorial', $paper_name);
            $tutorial->tutorial_url = "storage/tutorial/".$paper_name;
        } 

        $tutorial->title = $form_tutorial->title;
        $tutorial->description = $form_tutorial->description;
        $tutorial->type = $form_tutorial->type;
        $tutorial->education_level = $this->education_level_input;
        if ($this->education_level_input == 'primary' || $this->education_level_input == 'secondary') {
            $tutorial->year = $form_tutorial->year;
        } else if ($this->education_level_input == 'university') {
            $tutorial->major = isset($this->newMajor) == true ? str_replace(" ", "_", strtolower($this->newMajor)) : $this->inputMajor;
        }
        $tutorial->save();
        $this->dispatch("modal:success", ['type'=> "tutorial"]);
    }

    public function addWebinar() {
        $form_webinar = $this->form_webinar;
        $webinar = new Webminar();
        $webinar->title = $form_webinar->title;
        $webinar->description = $form_webinar->description;
        $webinar->yt_code = $form_webinar->yt_code;
        $webinar->education_level = $this->education_level_input;
        if ($this->education_level_input == 'primary' || $this->education_level_input == 'secondary') {
            $webinar->year = $form_webinar->year;
        } else if ($this->education_level_input == 'university') {
            $webinar->major = isset($this->newMajor) == true ? str_replace(" ", "_", strtolower($this->newMajor)) : $this->inputMajor;
        }
        $webinar->type = $form_webinar->type;
        $webinar->save();

        $this->dispatch("modal:success", ['type'=> "webinar video"]);
    }

    public function addCC() {
        $form_cc = $this->form_cc;
        $cc = new CrashCourse();
        $cc->title = $form_cc->title;
        $cc->description = $form_cc->description;
        $cc->yt_code = $form_cc->yt_code;
        $cc->education_level = $this->education_level_input;
        if ($this->education_level_input == 'primary' || $this->education_level_input == 'secondary') {
            $cc->year = $form_cc->year;
        } else if ($this->education_level_input == 'university') {
            $cc->major = isset($this->newMajor) == true ? str_replace(" ", "_", strtolower($this->newMajor)) : $this->inputMajor;
        }

        $cc->save();

        $this->dispatch("modal:success", ['type'=> "crash course video"]);
    }

    public function render()
    {

        if ($this->section == 'cc') {
            $this->allMajor = CrashCourse::whereNotNull('major')->select('major')->distinct()->get();
            
            $ccs = CrashCourse::with(['likes'])
            ->when($this->educationLevel != "", function($q) {
                return $q->where(['education_level' => $this->educationLevel]);
            })
            ->when(($this->educationLevel == "primary" || $this->educationLevel == "secondary") && $this->year != "", function($q) {
                return $q->where(['year' => $this->year]);
            })
            ->when($this->educationLevel == "university" && $this->major != "", function ($q) {
                return $q->where(['major'=>$this->major]);
            })
            ->when($this->search != '', function($q) {
                return $q->where('title', 'LIKE', '%'.$this->search."%");
            })
            ->orderBy('like','desc')
            ->paginate(10);
            return view('livewire.primary-secondary-study-view', ['ccs' => $ccs])->extends('layouts.app')->section('content');
        } else if ($this->section == 'webinars') {
            $this->allMajor = Webminar::whereNotNull('major')->select('major')->distinct()->get();
            $webinars = Webminar::with(['likes'])
            ->when($this->educationLevel != "", function($q) {
                return $q->where(['education_level' => $this->educationLevel]);
            })
            ->when(($this->educationLevel == "primary" || $this->educationLevel == "secondary") && $this->year != "", function($q) {
                return $q->where(['year' => $this->year]);
            })
            ->when($this->educationLevel == "university" && $this->major != "", function ($q) {
                return $q->where(['major'=>$this->major]);
            })
            ->when($this->search != '', function($q) {
                return $q->where('title', 'LIKE', '%'.$this->search."%");
            })
            ->when($this->type != '', function($q) {
                return $q->where(['type'=>$this->type]);
            })
            ->orderBy('like','desc')
            ->paginate(10);
            return view('livewire.primary-secondary-study-view', ['webinars' => $webinars])->extends('layouts.app')->section('content');
        } else if ($this->section == 'ln') {
            $this->allMajor = StudyWorkplaceNote::whereNotNull('major')->select('major')->distinct()->get();
            $lns = StudyWorkplaceNote::with(['likes'])
            ->when($this->educationLevel != "", function($q) {
                return $q->where(['education_level' => $this->educationLevel]);
            })
            ->when(($this->educationLevel == "primary" || $this->educationLevel == "secondary") && $this->year != "", function($q) {
                return $q->where(['year' => $this->year]);
            })
            ->when($this->educationLevel == "university" && $this->major != "", function ($q) {
                return $q->where(['major'=>$this->major]);
            })
            ->when($this->search != '', function($q) {
                return $q->where('title', 'LIKE', '%'.$this->search."%");
            })
            ->orderBy('like','desc')
            ->paginate(10);
            return view('livewire.primary-secondary-study-view', ['lns' => $lns])->extends('layouts.app')->section('content');
        } else if ($this->section == 'tutorials') {
            $this->allMajor = StudyWorkplaceTutorial::whereNotNull('major')->select('major')->distinct()->get();
            $tutorials = StudyWorkplaceTutorial::with(['likes'])
            ->when($this->educationLevel != "", function($q) {
                return $q->where(['education_level' => $this->educationLevel]);
            })
            ->when(($this->educationLevel == "primary" || $this->educationLevel == "secondary") && $this->year != "", function($q) {
                return $q->where(['year' => $this->year]);
            })
            ->when($this->educationLevel == "university" && $this->major != "", function ($q) {
                return $q->where(['major'=>$this->major]);
            })
            ->when($this->search != '', function($q) {
                return $q->where('title', 'LIKE', '%'.$this->search."%");
            })
            ->when($this->type != '', function($q) {
                return $q->where(['type'=>$this->type]);
            })
            ->orderBy('like','desc')
            ->paginate(10);
            return view('livewire.primary-secondary-study-view', ['tutorials' => $tutorials])->extends('layouts.app')->section('content');
        } else {
            $this->allMajor = GuestLecture::whereNotNull('major')->select('major')->distinct()->get();
            $gls = GuestLecture::with(['likes'])
            ->when($this->educationLevel != "", function($q) {
                return $q->where(['education_level' => $this->educationLevel]);
            })
            ->when(($this->educationLevel == "primary" || $this->educationLevel == "secondary") && $this->year != "", function($q) {
                return $q->where(['year' => $this->year]);
            })
            ->when($this->educationLevel == "university" && $this->major != "", function ($q) {
                return $q->where(['major'=>$this->major]);
            })
            ->when($this->search != '', function($q) {
                return $q->where('title', 'LIKE', '%'.$this->search."%");
            })
            ->orderBy('like','desc')
            ->paginate(10);

            return view('livewire.primary-secondary-study-view', ['gls'=>$gls])->extends('layouts.app')->section('content');
        }
        
    }
}
