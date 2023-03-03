<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Education;
use App\Models\Entrepreneurship;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{

    public function updatePersonalInformation(Request $request)
    {
        $request->validate([
            'telephone' => 'required',
            'school_name' => 'required',
            'class' => 'required',
        ]);

        $person = Person::where('user_id', Auth::user()->id)->first();
        $person->telephone = $request->telephone;
        $person->school_name = $request->school_name;
        $person->class = $request->class;
        $person->save();

        return redirect('')->back()->with('success', 'Personal Information Updated Successfully');
    }
}
