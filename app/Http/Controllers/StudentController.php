<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function Create(){
      return view('student.create');
    }
    public function Index(){
      $student = Student::all();
      return view('student.index',compact('student'));
    }
    public function Store(Request $request){

      $validatedData = $request->validate([
        'name' => 'required|max:25|min:4',
        'email' => 'required|unique:students',
        'phone' => 'required|unique:students|max:12|min:9',
      ]);

      $student = new Student;
      $student->name = $request->name;
      $student->email = $request->email;
      $student->phone = $request->phone;
      $save = $student->save();

      if($save){
        $notification =array(
          'message'=>'Successfully Save',
          'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
      }else {
        $notification =array(
          'message'=>'Somthing Went Wrong!!',
          'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
      }
    }
    public function Show($id){
      $student = Student::findorfail($id);
      return view('student.show',compact('student'));
    }
    public function Delete($id){

      $student = Student::findorfail($id);
      $delete = $student ->delete();
      if($delete){
        $notification =array(
          'message'=>'Successfully Deleted',
          'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
      }else {
        $notification =array(
          'message'=>'Somthing Went Wrong!!',
          'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
      }
    }
    public function Edit($id){
      $student = Student::findorfail($id);
      return view('student.edit',compact('student'));
    }
    public function Update(Request $request,$id){
        $student = Student::findorfail($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $save = $student->save();
        if($save){
          $notification =array(
            'message'=>'Successfully Save',
            'alert-type'=>'success'
          );
          return Redirect()->route('all.student')->with($notification);
        }else {
          $notification =array(
            'message'=>'Somthing Went Wrong!!',
            'alert-type'=>'error'
          );
          return Redirect()->back()->with($notification);
        }
    }
}
