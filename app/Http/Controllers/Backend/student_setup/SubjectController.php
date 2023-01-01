<?php

namespace App\Http\Controllers\Backend\student_setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Subject;

class SubjectController extends Controller
{
    public function SubjectView()
    {   
        $view_subject  = Subject::all();
       return view('backend/setup/subject/subject_view',compact('view_subject'));
    }

    public function SubjectAdd ()
    {
        return view('backend/setup/subject/subject_add');
    }

    public function SubjectStore (Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:subjects',
            
        ]);

        $data = new Subject();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' =>'Subject has been Added Succesfully.',
            'alert-type'=>'success',
        );
        

        return redirect()->route('subject/view')->with($notification);
    }

    

    public function SubjectEdit($id)
    {
        $subject_edit = Subject::find($id);
        return view('backend/setup/subject/subject_edit',compact('subject_edit'));
    }

    public function SubjectUpdate  (Request $request,$id)
    {
        $updatedata = Subject::find($id);
        $validated = $request->validate([
            'name' => 'required|unique:subjects,name,'.$updatedata->id
            
        ]);

        
        $updatedata->name = $request->name;
        $updatedata->save();
        
        $notification = array(
            'message' =>'Subject has been Updated Succesfully.',
            'alert-type'=>'success',
        );
        

        return redirect()->route('subject/view')->with($notification);

    }

    public function SubjectDelete ($id)
    {
        $deletedata = Subject::find($id)->delete();
        $notification = array(
            'message' =>'Subject has been Delete Succesfully.',
            'alert-type'=>'success',
        );

        return redirect()->route('subject/view')->with($notification);
    }


}
