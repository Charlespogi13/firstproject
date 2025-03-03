<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Students::all();

        return view('studentsLists', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'stdName' => 'required|string|max:255',
            'stdAge' => 'required|integer|min:1',
            'stdGender' => 'required|string|max:10'
        ]);
    
        Students::create([
            'name' => $request->stdName,
            'age' => $request->stdAge,
            'gender' => $request->stdGender
        ]);
    
        return redirect()->back()->with('success', 'Student created successfully.');
    }

     // Update Student
     public function update(Request $request, $id)
     {
         $request->validate([
             'stdName' => 'required|string|max:255',
             'stdAge' => 'required|integer|min:1',
             'stdGender' => 'required|string|max:10'
         ]);
 
         $student = Students::findOrFail($id);
         $student->name = $request->stdName;
         $student->age = $request->stdAge;
         $student->gender = $request->stdGender;
         $student->save();
 
         return redirect()->back()->with('success', 'Student updated successfully.');
     }
 
     // Delete Student
     public function destroy($id)
     {
         $student = Students::findOrFail($id);
         $student->delete();
 
         return redirect()->back()->with('success', 'Student deleted successfully.');
     }

}

