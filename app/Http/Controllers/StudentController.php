<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Contact;
use App\Models\Teacher;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    public function show($id)
    {

        // $address = Contact::find($id)->address;
        // cara seperti ini bisa tapi kurang tepat

        // $address = Student::find($id)->contact->address;
        // return view('example',['address' => $address]);


        // $name = Student::find($id)->teacher->name;
        // return view('example', ['name' => $name]);

// ini mencek nama murid sesuai id teacher
        // $students = Teacher::find($id)->students;
        // return view('example', ['students' => $students]);
 
        // emangginl menggunakan id ukm dan menampilkan nama murid
        // $activity = Activity::find($id);
        // $students =  $activity->students;
        // return view('example', ['activity'=>$activity,'students' => $students]);



       $student = Student::find($id);
       $activities = $student->activities;
       return view('show', ['student'=>$student,'activities'=>$activities]);
    }
    public function index(){
        $user = Auth::user();
        $id = Auth::id();

        //    $students = Student::all();
        $students = Student::paginate(2);
            return view('index',['students'=>$students,'user'=>$user,'id'=>$id]);
    }
    public function filter(){
        $students = Student::where('score','>=',85)
        ->where('name','LIKE','%t%')
        ->get();

            return view('filter',compact('students'));
    }

    public function create(){
        return view('create');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'score'=>'required'

        ]);
        Student::create([
            'name'=>$request->name,
            'score'=>$request->score,
            'teacher_id'=>1
        ]);

        return Redirect::route('index');
    }
     
    public function edit(Student $student){
        return view('edit',compact('student'));
    }

    public function update(Request $request, Student $student){
        $request->validate([
            'name'=>'required',
            'score'=>'required'

        ]);
        $student->update([
            'name'=>$request->name,
            'score'=>$request->score
        ]);
        return Redirect::route('index');
    }

    public function delete(Student $student){
        $student->delete();
        return Redirect::route('index');

    }
}
