<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }
    public function create(){
        return view('students.create');
    }
    public function store(Request $request){
        $request ->validate([
            'name'=> 'string|required|alpha',
            'email'=> 'string|required',
            'phone'=>'numeric|required',

        ]);
        $data= $request->all();
        $student=Student::create([
            'name'=> $data['name'],
            'email'=> $data['name'],
            'phone'=> $data['phone'],
        ]);
        return redirect()->route('students.index')->with('success','Student added successfully!');
    }

    public function show($id){
        $student = Student::find($id);  
        return view('students.show', compact('student'));
    }

    public function edit($id){
        $student = Student::find($id);
        return view('students.edit', compact('student'));

    }
    public function update(Request $request, $id){
        $request ->validate([
            'name'=> 'string|required|alpha',
            'email'=> 'string|required',
            'phone'=>'numeric|required',
        ]);
        $data= $request->all(); 
        Student::find($id)->update($data);
        return redirect()->route('students.index')->with('success','Student updated successfully!');

    }
    public function destroy($id){
        Student::find($id)->delete();
        return redirect()->route('students.index')->with('success','Student deleted successfully!');
    }
}
