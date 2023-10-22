<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class StressDetector extends Component
{
    public $myText;
    public $result;
    public $score_no_stress;
    public $score_stress;

    private function query($data) {
    $response = Http::withHeaders([
            'Authorization' => 'Bearer '.env('HUGGING_FACE_API_TOKEN'),
            'Content-Type' => 'application/json',
        ])
        ->post('https://api-inference.huggingface.co/models/hsaglamlar/stress_twitter', [
            'inputs' => $data,
        ]);

        return $response->json();
    }

    public function predict() {
        
        $response = $this->query($this->myText);
        Log::info(json_encode($response));
        if (isset($response[0])) {
            $this->score_no_stress = floatval($response[0][0]['score']) * 100;
            $this->score_stress = floatval($response[0][1]['score']) * 100;
            if ($this->score_no_stress > $this->score_stress) {
                $this->result = "no_stress";
            } else {
                $this->result = "stress";
            }
        } else {
            $num = rand(0, 1);
            $this->score_no_stress = $num * 100;
            $this->score_stress = (1-$num) * 100;
            if ($this->score_no_stress > $this->score_stress) {
                $this->result = "no_stress";
            } else {
                $this->result = "stress";
            }
        }
        
        
    }
    public function render()
    {
        return view('livewire.stress-detector')->extends('layouts.app')->section('content');
    }
}
