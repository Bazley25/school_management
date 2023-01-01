<?php

namespace App\Http\Controllers\Backend\student_setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ExamType;

class ExamTypeController extends Controller
{
    public function ExamTypeView()
    {   
        $all_exam  = ExamType::all();
       return view('backend/setup/exam_type/exam_type_view',compact('all_exam'));
    }

    public function ExamTypeAdd()
    {
        return view('backend/setup/exam_type/exam_type_add');
    }

    public function ExamTypeStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:exam_types',
            
        ]);

        $data = new ExamType();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' =>'Exam Type has been Added Succesfully.',
            'alert-type'=>'success',
        );
        

        return redirect()->route('exam/type/view')->with($notification);
    }

    

    public function ExamTypeEdit($id)
    {
        $exam_edit = ExamType::find($id);
        return view('backend/setup/exam_type/exam_type_edit',compact('exam_edit'));
    }

    public function ExamTypeUpdate (Request $request,$id)
    {
        $updatedata = ExamType::find($id);
        $validated = $request->validate([
            'name' => 'required|unique:exam_types,name,'.$updatedata->id
            
        ]);

        
        $updatedata->name = $request->name;
        $updatedata->save();
        
        $notification = array(
            'message' =>'Exam Type has been Updated Succesfully.',
            'alert-type'=>'success',
        );
        

        return redirect()->route('exam/type/view')->with($notification);

    }

    public function ExamTypeDelete($id)
    {
        $deletedata = ExamType::find($id)->delete();
        $notification = array(
            'message' =>'Exam Type has been Delete Succesfully.',
            'alert-type'=>'success',
        );

        return redirect()->route('exam/type/view')->with($notification);
    }
}
