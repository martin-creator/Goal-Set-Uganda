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

            $this->state = [
                'co-cirricular' => Entrepreneurship::where('user_id', Auth::user()->id)->first()->co_cirricular,
                'economic_activity' => Entrepreneurship::where('user_id', Auth::user()->id)->first()->economic_activity,
            ];
        }
    }


    //insert  entrepreneurship information into database
    public function insertEntrepreneurshipInformation()
    {
        $this->validate([
            'state.co-cirricular' => 'required',
            'state.economic_activity' => 'required',
        ]);

        if (Entrepreneurship::where('user_id', Auth::user()->id)->exists()) {

            $this->updateEntrepreneurshipInformation();

            return redirect('/academic-profile')->with('success', 'Entrepreneurship information updated successfully');
        }

        Entrepreneurship::create([
            'user_id' => Auth::user()->id,
            'co-cirricular' => $this->state['co-cirricular'],
            'economic_activity' => $this->state['economic_activity'],
        ]);

        return redirect('/academic-profile')->with('success', 'Entrepreneurship information added successfully');

    }

    // update entrepreneurship information into database
    public function updateEntrepreneurshipInformation()
    {
        $this->validate([
            'state.co-cirricular' => 'required',
            'state.economic_activity' => 'required',
        ]);

        Entrepreneurship::where('user_id', Auth::user()->id)->update([
            'co-cirricular' => $this->state['co-cirricular'],
            'economic_activity' => $this->state['economic_activity'],
        ]);
    }


    public function render()
    {
        return view('livewire.entrepreneurial');
    }
}
