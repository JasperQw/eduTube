<?php

namespace App\Livewire;

use App\Livewire\Forms\MentalHealthArticleForm;
use App\Models\like;
use App\Models\MentalHealthArticle;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MentalHealthWorkplace extends Component
{
    use WithPagination;
    public $search = "";
    public MentalHealthArticleForm $form;

    public function like($id) {
        $like = new like();
        $like->target_id = $id;
        $like->target_type = MentalHealthArticle::class;
        $like->user_id = Auth::user()->id;
        $like->save();

        $any = MentalHealthArticle::find($id);
        $any->like += 1;
        $any->save();
    }

    public function addArticle() {
        $form = $this->form;
        $article = new MentalHealthArticle();
        $article->title = $form->title;
        $article->description = $form->description;
        $article->content = $form->content;
        $article->user_id = Auth::user()->id;

        $article->save();

        $this->dispatch("modal:suarticleess", ['type'=> "crash course video"]);
    }

    public function render()
    {
        $articles = MentalHealthArticle::with(['user', 'likes'])
        ->when($this->search != '', function ($q){
            return $q->where('title', 'LIKE', "%".$this->search."%");
        })
        ->orderBy('like', 'desc')
        ->paginate(10);

        return view('livewire.mental-health-workplace', ['articles'=>$articles])->extends('layouts.app')->section('content');
    }
}
