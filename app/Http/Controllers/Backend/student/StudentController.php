<?php

namespace App\Http\Controllers\Backend\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\AssignStudent;

use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;

use DB;

class StudentController extends Controller
{
    public function StudentRegiView()
    {
        $data['AllData'] = AssignStudent::all();
        return view('backend/student/student_regi/student_regi_view',$data);
    }


    public function StudentRegiAdd()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        return view('backend/student/student_regi/student_regi_add',$data);
    }


    public function StudentRegiStore(Request $request)
    {
        DB::transaction(function() use($request) {
            
            $Yearcheck = StudentYear::find($request->year_id)->name;
            $student = User::where('usertype','student')->orderBy('id','DESC')->first();

            if ($student == NULL) {
                $firstRegi = 0;
                $studentId = $firstRegi+1;
                if ($studentId < 10) {
                    $id_no = '000'.$studentId;
                } elseif($studentId < 100) {
                    $id_no = '00'.$studentId;
                } elseif($studentId < 1000){
                    $id_no = '0'.$studentId;
                }// 1st if end method

            } else{
                $student = User::where('usertype','student')->orderBy('id','DESC')->first()->id;

                $studentId = $student+1;

                if ($studentId < 10) {
                    $id_no = '000'.$studentId;
                } elseif($studentId < 100) {
                    $id_no = '00'.$studentId;
                } elseif($studentId < 1000){
                    $id_no = '0'.$studentId;
                }

            } // 1st if end method
            
            $final_id_no = $Yearcheck.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'Student';
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));
           
            
        });

    }  // end method
    




}
