<?php

namespace App\Livewire;

use App\Models\like;
use App\Models\MentalHealthArticle;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MentalHealthArticleView extends Component
{
    public $article;
    public $id;

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

    public function mount($id) {
        $this->id = $id;
        $article = MentalHealthArticle::with(['likes'])->where('id', $id)->first();    
        if (isset($article) == true) {
            $this->article = $article;
        } else {
            $this->redirect("/mental-health-workplace");
        }
    }
    public function render()
    {
        $this->article = MentalHealthArticle::with(['likes'])->where('id', $this->id)->first();    
        return view('livewire.mental-health-article-view')->extends('layouts.app')->section('content');
    }
}
