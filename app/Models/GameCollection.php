<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class GameCollection extends Model
{
    use HasFactory;

    public function likes() {
        return $this->belongsTo(like::class, 'id', 'target_id')->where(['user_id' => Auth::user()->id, 'target_type' => GameCollection::class]);
    }
}
