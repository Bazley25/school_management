<?php

namespace App\Http\Controllers\Backend\student_setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentClass;
use App\Models\Subject;
use App\Models\AssignSubject;

class AssignSubjectController extends Controller
{
    public function AssignSubjectView()
    {   
        // $data['editamount'] = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
        // $data['assign_all_subject'] = AssignSubject::all();
        // $data['classes'] = StudentClass::all();
        $data['assign_data']  = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend/setup/assign_subject/assign_subject_view',$data);
    }

    public function AssignSubjectAdd ()
    {
        $data['add_subject'] = Subject::all();
        $data['classes'] = StudentClass::all();
        return view('backend/setup/assign_subject/assign_subject_add',$data);
    }

    public function AssignSubjectStore (Request $request)
    {
        
        $subjectCount = count($request->subject_id);
        if($subjectCount != NULL){
            for ($i =0; $i < $subjectCount; $i++ ){
                
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();

                

            } // end for condition
        }// endif condition
        $notification = array(
            'message' =>'Assign Subject has been Added Succesfully.',
            'alert-type'=>'success',
        );
        

        return redirect()->route('assign/subject/view')->with($notification);
        
    }

    

    public function AssignSubjectEdit ($class_id)
    {
        // $fee_amount_edit = FeeCategory::find($fee_category_id);
        $data['edit_assign_subject'] = AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        $data['add_subject'] = Subject::all();
        $data['classes'] = StudentClass::all();
        return view('backend/setup/assign_subject/assign_subject_edit',$data);
    }

    public function AssignSubjectUpdate (Request $request,$class_id)
    {

        if ($request->subject_id == NULL) {
            $notification = array(
                'message' =>'Sorry, You can not change without any data.',
                'alert-type'=>'error',
            );
            
            return redirect()->route('assign/subject/edit',$class_id)->with($notification);
        }else{
            $subjectCount = count($request->subject_id);
            AssignSubject::where('class_id',$class_id)->delete();

            for ($i =0; $i < $subjectCount; $i++ ){
                $update_assign_subject = new AssignSubject();
                $update_assign_subject->class_id = $request->class_id;
                $update_assign_subject->subject_id = $request->subject_id[$i];
                $update_assign_subject->full_mark = $request->full_mark[$i];
                $update_assign_subject->pass_mark = $request->pass_mark[$i];
                $update_assign_subject->subjective_mark = $request->subjective_mark[$i];
                $update_assign_subject->save();

            } // end for condition
        
        }
        $notification = array(
            'message' =>'Assign Subject has been Updated Succesfully.',
            'alert-type'=>'success',
        );
        

        return redirect()->route('assign/subject/view')->with($notification);

    }


    public function AssignSubjectDetails ($class_id)
    {
        $data['detailsuject'] = AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
    
        return view('backend/setup/assign_subject/assign_subject_details',$data);
    
    
    }


    public function AssignSubjectDelete($class_id)
    {
        // $deletedata = AssignSubject::find($class_id)->where('class_id',$class_id)->delete();
        // FeeCategoryAmount::where('fee_category_id',$fee_category_id)->delete();
        $deletedata = AssignSubject::where('class_id',$class_id)->delete();
        $notification = array(
            'message' =>'Fee Amount has been Deleted Succesfully.',
            'alert-type'=>'success',
        );

        return redirect()->route('assign/subject/view')->with($notification);
    }

      





}
