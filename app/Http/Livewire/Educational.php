<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Education;

class Educational extends Component
{
    public $state = [];

    

    public function render()
    {
        return view('livewire.educational');
    }
}
