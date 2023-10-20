<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CommunityNote extends Model
{
    use HasFactory;

    public function likes() {
        return $this->belongsTo(like::class, 'id', 'target_id')->where(['user_id' => Auth::user()->id, 'target_type'=>CommunityNote::class]);
    }

    public function collects() {
        return $this->belongsTo(Collection::class, 'id', 'community_note_id')->where('user_id', '=', Auth::user()->id);
    }
    
}
