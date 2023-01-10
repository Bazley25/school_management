<?php

namespace App\Http\Controllers\Backend\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\AssignStudent;
use App\Models\FeeCategoryAmount;

use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;

use DB;
use PDF;

class StudentRollController extends Controller
{
    public function StudentRollView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        return view('backend/student/roll_generate/student_roll_view',$data);
    }

    public function RegiStudentGets(Request $request)
    {
        $Alldata = AssignStudent::with(['student_info'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
        // dd($data->toArray());
        return response()->json($Alldata);
    }


    public function StudentRollStore(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        if ($request->student_id != null) {
            for ($i=0; $i < count($request->student_id) ; $i++) { 
                AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->where('student_id',$request->student_id[$i])->update(['roll' =>$request->roll[$i]]);
            }
        }else{
            $notification = array(
                'message' =>'Sorry, There is no Student Data',
                'alert-type'=>'error',
            );
            
    
            return redirect()->back()->with($notification);
        }

        $notification = array(
            'message' =>'Student Roll has been Generate Succesfully.',
            'alert-type'=>'success',
        );
        return redirect()->route('student/roll/view')->with($notification);

    }
}
