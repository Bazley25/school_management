<?php

namespace App\Http\Controllers\Backend\student_setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    public function StudentShiftView()
    {   
        $shift_data  = StudentShift::all();
       return view('backend/setup/student_shift/shift_view',compact('shift_data'));
    }

    public function StudentShiftAdd ()
    {
        return view('backend/setup/student_shift/shift_add');
    }

    public function StudentShiftStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:student_shifts',
            
        ]);

        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' =>'Shift has been Added Succesfully.',
            'alert-type'=>'success',
        );
        

        return redirect()->route('student/shift/view')->with($notification);
    }

    

    public function StudentShiftEdit($id)
    {
        $shift_edit = StudentShift::find($id);
        return view('backend/setup/student_shift/shift_edit',compact('shift_edit'));
    }

    public function StudentShiftUpdate(Request $request,$id)
    {
        $updatedata = StudentShift::find($id);
        $validated = $request->validate([
            'name' => 'required|unique:student_shifts,name,'.$updatedata->id
            
        ]);

        
        $updatedata->name = $request->name;
        $updatedata->save();
        
        $notification = array(
            'message' =>' Shift has been Updated Succesfully.',
            'alert-type'=>'success',
        );
        

        return redirect()->route('student/shift/view')->with($notification);

    }

    public function StudentShiftDelete($id)
    {
        $deletedata = StudentShift::find($id)->delete();
        $notification = array(
            'message' =>'Group has been Delete Succesfully.',
            'alert-type'=>'success',
        );

        return redirect()->route('student/shift/view')->with($notification);
    }

}
