<?php

namespace App\Http\Controllers\Backend\student_setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function StudentYearView()
    {   
        $student_data  = StudentYear::all();
       return view('backend/setup/student_year/student_year_view',compact('student_data'));
    }

    public function StudentYearAdd()
    {
        return view('backend/setup/student_year/student_year_add');
    }

    public function StudentYeartore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:student_years',
            
        ]);

        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' =>'Year has been Added Succesfully.',
            'alert-type'=>'success',
        );
        

        return redirect()->route('student/year/view')->with($notification);
    }

    

    public function StudentYearEdit($id)
    {
        $year_edit = StudentYear::find($id);
        return view('backend/setup/student_year/student_year_edit',compact('year_edit'));
    }

    public function StudentYearUpdate(Request $request,$id)
    {
        $updatedata = StudentYear::find($id);
        $validated = $request->validate([
            'name' => 'required|unique:student_years,name,'.$updatedata->id
            
        ]);

        
        $updatedata->name = $request->name;
        $updatedata->save();
        
        $notification = array(
            'message' =>' Year has been Updated Succesfully.',
            'alert-type'=>'success',
        );
        

        return redirect()->route('student/year/view')->with($notification);

    }

    public function StudentYearDelete($id)
    {
        $deletedata = StudentYear::find($id)->delete();
        $notification = array(
            'message' =>'Year has been Delete Succesfully.',
            'alert-type'=>'success',
        );

        return redirect()->route('student/year/view')->with($notification);
    }


}
