<?php

namespace App\Livewire;

use App\Livewire\Forms\CounsellingSectionForm;
use App\Models\CounsellingSection as ModelsCounsellingSection;
use App\Models\like;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CounsellingSection extends Component
{
    use WithPagination;
    public $search = "";
    public CounsellingSectionForm $form;

    public function like($id) {
        $like = new like();
        $like->target_id = $id;
        $like->target_type = ModelsCounsellingSection::class;
        $like->user_id = Auth::user()->id;
        $like->save();

        $any = ModelsCounsellingSection::find($id);
        $any->like += 1;
        $any->save();
    }

    public function addCounsellingSection() {
        $form = $this->form;
        $record = new ModelsCounsellingSection();
        $record->title = $form->title;
        $record->start = str_replace("T", " ",$form->start).":00";
        $record->end = str_replace("T", " ",$form->end).":00";
        $record->description = $form->description;
        $record->contact_link = $form->link;
        $record->user_id = Auth::user()->id;
        $record->save();

        $this->dispatch('modal:success');
    }


    public function render()
    {
        $articles = ModelsCounsellingSection::with(['user', 'likes'])
        ->when($this->search != '', function ($q){
            return $q->where('title', 'LIKE', "%".$this->search."%");
        })
        ->orderBy('like', 'desc')
        ->paginate(10);

        return view('livewire.counselling-section', ['articles'=>$articles])->extends('layouts.app')->section('content');
    }
}
