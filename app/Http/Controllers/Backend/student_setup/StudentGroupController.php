<?php

namespace App\Http\Controllers\Backend\student_setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;



class StudentGroupController extends Controller
{
    public function StudentGroupView()
    {   
        $group_data  = StudentGroup::all();
       return view('backend/setup/student_group/student_group_view',compact('group_data'));
    }

    public function StudentGroupAdd()
    {
        return view('backend/setup/student_group/student_group_add');
    }

    public function StudentGroupStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:student_groups',
            
        ]);

        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' =>'Group has been Added Succesfully.',
            'alert-type'=>'success',
        );
        

        return redirect()->route('student/group/view')->with($notification);
    }

    

    public function StudentGroupEdit($id)
    {
        $group_edit = StudentGroup::find($id);
        return view('backend/setup/student_group/student_group_edit',compact('group_edit'));
    }

    public function StudentGroupupdate(Request $request,$id)
    {
        $updatedata = StudentGroup::find($id);
        $validated = $request->validate([
            'name' => 'required|unique:student_groups,name,'.$updatedata->id
            
        ]);

        
        $updatedata->name = $request->name;
        $updatedata->save();
        
        $notification = array(
            'message' =>' Group has been Updated Succesfully.',
            'alert-type'=>'success',
        );
        

        return redirect()->route('student/group/view')->with($notification);

    }

    public function StudentGroupDelete($id)
    {
        $deletedata = StudentGroup::find($id)->delete();
        $notification = array(
            'message' =>'Group has been Delete Succesfully.',
            'alert-type'=>'success',
        );

        return redirect()->route('student/group/view')->with($notification);
    }

}
