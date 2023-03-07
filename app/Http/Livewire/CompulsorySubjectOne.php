<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subject;
use App\Models\Target;
use App\Models\Actual;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        ];

        // if Target and Actual exists, update $state with data from database
        if(Target::where('user_id', Auth::user()->id)->exists() and Actual::where('user_id', Auth::user()->id)->exists()){
            Log::info("selcted subject is:", [$this->selectedSubject]);
            $targetSubjectId = Actual::where('user_id', Auth::user()->id)->first()->subject_id;
            Log::info("target subject id is:", [$targetSubjectId]);
            $target = Target::where('user_id', Auth::user()->id)->where('subject_id', $targetSubjectId)->first();
            $actual = Actual::where('user_id', Auth::user()->id)->where('subject_id', $targetSubjectId)->first();
            $subject = Subject::where('id', $targetSubjectId)->first();

            $this->state = [
                'subject_name' => $subject->subject_name,
                'paper_one_target' => $target->Paper_one,
                'paper_one_actual' => $actual->Paper_one,
                'paper_two_target' => $target->Paper_two,
                'paper_two_actual' => $actual->Paper_two,
                'paper_three_target' => $target->Paper_three,
                'paper_three_actual' => $actual->Paper_three,
                'paper_four_target' => $target->Paper_four,
            ];
        }
    }

    // insert or update marks
    public function insertActualAndTargetMarks(){
        $this->validate([
            'state.subject_name' => 'required',
            'state.paper_one_target' => 'required',
            'state.paper_one_actual' => 'required',
            'state.paper_two_target' => 'required',
            'state.paper_two_actual' => 'required',
            'state.paper_three_target' => 'required',
            'state.paper_three_actual' => 'required',
        ]);

        $target = new Target();
        $actual = new Actual();
        $user = Auth::user();

        // if Target and Actual exists, update
        if(Target::where('user_id', $user->id)->exists() and Actual::where('user_id', $user->id)->exists()){
            Log::info("Hello, I am here to update");
            $this->updateActualAndTargetMarks();
            return redirect()->back()->with('success', 'Marks Updated Successfully');
        }

        Log::info('user', ['user'=>$user]);

        $subject = Subject::where('subject_name', $this->state['subject_name'])->first();


        $target->user_id = $user->id;
        $target->subject_id = $subject->id;
        $target->Paper_one = $this->state['paper_one_target'];
        $target->Paper_two = $this->state['paper_two_target'];
        $target->Paper_three = $this->state['paper_three_target'];

        $actual->user_id = $user->id;
        $actual->subject_id = $subject->id;
        $actual->Paper_one = $this->state['paper_one_actual'];
        $actual->Paper_two = $this->state['paper_two_actual'];
        $actual->Paper_three = $this->state['paper_three_actual'];


        $target->save();
        $actual->save();

        return redirect('/set-goals')->with('success', 'Marks Added Successfully');


    }


    // update the marks
    public function updateActualAndTargetMarks(){

        $user = Auth::user();
        Log::info('user', ['user'=>$user]);
        $target = Target::where('user_id', $user->id)->first();
        // $actual = new Actual();
        $subject = Subject::where('subject_name', $this->state['subject_name'])->first();

        Log::info('target', ['Target'=>$target]);

        Log::info('Subject', ['Subjects'=>$subject]);

        Target::where('user_id', $user->id)->update([
            'Paper_one' => $this->state['paper_one_target'],
            'Paper_two' => $this->state['paper_two_target'],
            'Paper_three' => $this->state['paper_three_target'],
            'subject_id' => $subject->id,
        ]);

        Actual::where('user_id', $user->id)->update([
            'Paper_one' => $this->state['paper_one_actual'],
            'Paper_two' => $this->state['paper_two_actual'],
            'Paper_three' => $this->state['paper_three_actual'],
            'subject_id' => $subject->id,
        ]);

        // $target->Paper_one = $this->state['paper_one_target'];
        // $target->Paper_two = $this->state['paper_two_target'];
        // $target->Paper_three = $this->state['paper_three_target'];
        // $target->user_id = $user->id;
        // $target->subject_id = $subject->id;

        // $actual->Paper_one = $this->state['paper_one_actual'];
        // $actual->Paper_two = $this->state['paper_two_actual'];
        // $actual->Paper_three = $this->state['paper_three_actual'];
        // $actual->user_id = $user->id;
        // $actual->subject_id = $subject->id;

        // $target->save();
        // $actual->save();


    }


    // render the view
    public function render()
    {
        $listedSubjects = Subject::all();
        return view('livewire.compulsory-subject-one', compact('listedSubjects'));
    }
}
