<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Entrepreneurship;

class Entrepreneurial extends Component
{

    public $state = [];

    public function mount()
    {

        // initialize $state with some data from entrepreneurship table
        $this->state = [
            'co-cirricular' => 'football',
            'economic_activity' => 'farming',
        ];

        // if Person exists, update $state with data from database
        if (Entrepreneurship::where('user_id', Auth::user()->id)->exists()) {
           
        }
    }


    public function render()
    {
        return view('livewire.entrepreneurial');
    }
}
