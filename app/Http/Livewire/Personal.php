<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Person;
use Illuminate\Support\Facades\Auth;

class Personal extends Component
{

    public $state = [];

    public function mount()
    {
        // initialize $state with some data
        $this->state = [
            'school_name' => 'ABC School',
            'telephone' => '1234567890',
            'class' => '10',
            // ...
        ];
    }

    public function insertPersonalInformation()
    {
        $this->validate([
            'state.school_name' => 'required',
            'state.telephone' => 'required',
            'state.class' => 'required',
        ]);
        

        $person = new Person();
        $person->school_name = $this->state['school_name'];
        $person->telephone = $this->state['telephone'];
        $person->class = $this->state['class'];
        $person->user_id = Auth::user()->id;
        $person->save();

        return redirect('')->back()->with('success', 'Personal Information Updated Successfully');
    }



    public function render()
    {
        return view('livewire.personal');
    }
}
