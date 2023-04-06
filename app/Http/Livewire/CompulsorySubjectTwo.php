<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subject;
use App\Models\Target;
use App\Models\Actual;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CompulsorySubjectTwo extends Component
{

    public $state_two = [];
    public $selectedSubject_two = null;

    public function mount()
    {
        $this->state_two = [
            'subject_name_two' => 'History',
            'paper_one_target_two' => '0',
            'paper_one_actual_two' => '60',
            'paper_two_target_two' => '0',
            'paper_two_actual_two' => '0',
            'paper_three_target_two' => '0',
            'paper_three_actual_two' => '0',
        ];


        // if Target and Actual exists, update $state_two with data from database
        if(Target::where('user_id', Auth::user()->id)->exists() and Actual::where('user_id', Auth::user()->id)->exists()){
            Log::info("selcted subject is:", [$this->selectedSubject_two]);
            Log::info("user id is:", [Auth::user()->id]);
            $target_twoSubjectId = Actual::where('user_id', Auth::user()->id)->first()->subject_id;
            Log::info("target subject id is:", [$target_twoSubjectId]);
            // $target_two = Target::where('user_id', Auth::user()->id)->where('subject_id', $target_twoSubjectId)->first();
            // $actual_two = Actual::where('user_id', Auth::user()->id)->where('subject_id', $target_twoSubjectId)->first();
            // $subject = Subject::where('id', $target_twoSubjectId)->first();

            // $this->state_two = [
            //     'subject_name_two' => $subject->subject_name,
            //     'paper_one_target_two' => $target_two->Paper_one,
            //     'paper_one_actual_two' => $actual_two->Paper_one,
            //     'paper_two_target_two' => $target_two->Paper_two,
            //     'paper_two_actual_two' => $actual_two->Paper_two,
            //     'paper_three_target_two' => $target_two->Paper_three,
            //     'paper_three_actual_two' => $actual_two->Paper_three,

            // ];
        }
    }

    // insert or update marks
    public function insertActualAndTargetMarksTwo(){
        $this->validate([
            'state.subject_name' => 'required',
            'state.paper_one_target_two' => 'required',
            'state.paper_one_actual_two' => 'required',
            'state.paper_two_target_two' => 'required',
            'state.paper_two_actual_two' => 'required',
            'state.paper_three_target_two' => 'required',
            'state.paper_three_actual_two' => 'required',
        ]);

        $target_two = new Target();
        $actual_two = new Actual();
        $user = Auth::user();

        // if Target and Actual exists, update
        if(Target::where('user_id', $user->id)->exists() and Actual::where('user_id', $user->id)->exists()){
            Log::info("Hello, I am here to update");
            $this->updateActualAndTargetMarks();
            return redirect()->back()->with('success', 'Marks Updated Successfully');
        }

        Log::info('user', ['user'=>$user]);

        $subject = Subject::where('subject_name', $this->state_two['subject_name_two'])->first();


        $target_two->user_id = $user->id;
        $target_two->subject_id = $subject->id;
        $target_two->Paper_one = $this->state_two['paper_one_target_two'];
        $target_two->Paper_two = $this->state_two['paper_two_target_two'];
        $target_two->Paper_three = $this->state_two['paper_three_target_two'];

        $actual_two->user_id = $user->id;
        $actual_two->subject_id = $subject->id;
        $actual_two->Paper_one = $this->state_two['paper_one_actual_two'];
        $actual_two->Paper_two = $this->state_two['paper_two_actual_two'];
        $actual_two->Paper_three = $this->state_two['paper_three_actual_two'];


        $target_two->save();
        $actual_two->save();

        return redirect('/set-goals')->with('success', 'Marks Added Successfully');


    }


    // update the marks
    public function updateActualAndTargetMarks(){

        $user = Auth::user();
        Log::info('user', ['user'=>$user]);
        $target_two = Target::where('user_id', $user->id)->first();
        // $actual_two = new Actual();
        $subject = Subject::where('subject_name', $this->state_two['subject_name_two'])->first();

        Log::info('target', ['Target'=>$target_two]);

        Log::info('Subject', ['Subjects'=>$subject]);

        Target::where('user_id', $user->id)->update([
            'Paper_one' => $this->state_two['paper_one_target_two'],
            'Paper_two' => $this->state_two['paper_two_target_two'],
            'Paper_three' => $this->state_two['paper_three_target_two'],
            'subject_id' => $subject->id,
        ]);

        Actual::where('user_id', $user->id)->update([
            'Paper_one' => $this->state_two['paper_one_actual_two'],
            'Paper_two' => $this->state_two['paper_two_actual_two'],
            'Paper_three' => $this->state_two['paper_three_actual_two'],
            'subject_id' => $subject->id,
        ]);

        // $target_two->Paper_one = $this->state_two['paper_one_target_two'];
        // $target_two->Paper_two = $this->state_two['paper_two_target_two'];
        // $target_two->Paper_three = $this->state_two['paper_three_target_two'];
        // $target_two->user_id = $user->id;
        // $target_two->subject_id = $subject->id;

        // $actual_two->Paper_one = $this->state_two['paper_one_actual_two'];
        // $actual_two->Paper_two = $this->state_two['paper_two_actual_two'];
        // $actual_two->Paper_three = $this->state_two['paper_three_actual_two'];
        // $actual_two->user_id = $user->id;
        // $actual_two->subject_id = $subject->id;

        // $target_two->save();
        // $actual_two->save();


    }


    public function render()
    {
        $listedSubjects_two = Subject::all();
        return view('livewire.compulsory-subject-two', compact('listedSubjects_two'));
    }
}
