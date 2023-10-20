<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Livewire\Component;

class ChillingWorkplace extends Component
{
    public $checkedin;
    public $checked;

    public function mount() {
        $user = Auth::user();
        $this->checkedin = $user->check_in;
        $today = Date::now();
        $day = intval($today->format('d'));
        if ($user->last_check_in == $day) {
            $this->checked = true;
        } else if ($user->last_check_in < $day - 1) {
            $user_db = User::find($user->id);
            $user_db->check_in = 0;
            $user_db->save();
            $this->checked = false;
            $this->checkedin = 0;
        } else {
            $this->checked = false;
        }
    }
    public function checkin() {
        $today = Date::now();
        $day = intval($today->format('d'));
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->check_in += 1;
        $user->last_check_in = $day;
        $user->save();
        $this->checkedin += 1;
        $this->checked = true;
    }

    public function getReward() {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->check_in = 0;
        $user->points += 10;
        $user->save();
        $this->checkedin = 0;
    }

    public function render()
    {
        return view('livewire.chilling-workplace')->extends('layouts.app')->section('content');
    }
}
