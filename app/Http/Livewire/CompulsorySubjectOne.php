<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subject;
use App\Models\Target;
use App\Models\Actual;
use Illuminate\Support\Facades\Auth;

class CompulsorySubjectOne extends Component
{
    public $state = [];
    public $selectedSubject = null;

    public function mount()
    {
        $this->state = [
            'subject_name' => 'History',
            'paper_one_target' => '0',
            'paper_one_actual' => '60',
            'paper_two_target' => '0',
            'paper_two_actual' => '0',
            'paper_three_target' => '0',
            'paper_three_actual' => '0',
            'paper_four_target' => '0',
        ];

        // if (Subject::where('user_id', Auth::user()->id)->exists()) {
        //     $this->state = [
        //         'subject' => Subject::where('user_id', Auth::user()->id)->first()->subject,
        //         'target' => Target::where('user_id', Auth::user()->id)->first()->target,
        //         'actual' => Actual::where('user_id', Auth::user()->id)->first()->actual,
        //     ];
        // }
    }
    public function render()
    {
        $listedSubjects = Subject::all();
        return view('livewire.compulsory-subject-one', compact('listedSubjects'));
    }
}
