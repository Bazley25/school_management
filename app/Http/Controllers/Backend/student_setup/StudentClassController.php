<?php

namespace App\Http\Controllers\Backend\student_setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function StudentView()
    {   
        $student_data  = StudentClass::all();
       return view('backend/setup/student_class/view_student_class',compact('student_data'));
    }

    public function StudentClassAdd()
    {
        return view('backend/setup/student_class/student_class_add');
    }

    public function StudentClassStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:student_classes',
            
        ]);

        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' =>'Student Class has been Added Succesfully.',
            'alert-type'=>'success',
        );
        

        return redirect()->route('student/class/view')->with($notification);
    }

    

    public function StudentClassEdit($id)
    {
        $class_edit = StudentClass::find($id);
        return view('backend/setup/student_class/student_class_edit',compact('class_edit'));
    }

    public function StudentClassUpdate(Request $request,$id)
    {
        $updatedata = StudentClass::find($id);
        $validated = $request->validate([
            'name' => 'required|unique:student_classes,name,'.$updatedata->id
            
        ]);

        
        $updatedata->name = $request->name;
        $updatedata->save();
        
        $notification = array(
            'message' =>'Student Class has been Updated Succesfully.',
            'alert-type'=>'success',
        );
        

        return redirect()->route('student/class/view')->with($notification);

    }

    public function StudentClassDelete($id)
    {
        $deletedata = StudentClass::find($id)->delete();
        $notification = array(
            'message' =>'Student Class has been Delete Succesfully.',
            'alert-type'=>'success',
        );

        return redirect()->route('student/class/view')->with($notification);
    }



}
