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
use PDF;

class StudentController extends Controller
{
    public function StudentRegiView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        $data['year_id'] = StudentYear::orderBy('id','desc')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id','desc')->first()->id;
        $data['AllData'] = AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();
        return view('backend/student/student_regi/student_regi_view',$data);
    }

    // search Option
    public function StudentYearClassSearch(Request $request)
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        $data['year_id'] = $request->year_id;
        $data['class_id'] = $request->class_id;
        $data['AllData'] = AssignStudent::where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
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

            if($request->file('image')){
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'),$filename);
                $user['image'] = $filename;
            }
            $user->save();

            
            $assignstudent = new AssignStudent();
            $assignstudent->student_id = $user->id;
            $assignstudent->class_id = $request->class_id;
            $assignstudent->year_id = $request->year_id;
            $assignstudent->group_id = $request->group_id;
            $assignstudent->shift_id = $request->shift_id;
            $assignstudent->save();

            
            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assignstudent->id;
            $discount_student->fee_category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();
            
        });

        $notification = array(
            'message' =>' Student Registration has been Completed Succesfully.',
            'alert-type'=>'success',
        );
        

        return redirect()->route('student/registration/view')->with($notification);

    }  // end method
    

    public function StudentRegiEdit($student_id)
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();

        $data['dataEdit'] = AssignStudent::with(['student_info','student_discount'])->where('student_id',$student_id)->first();
        // dd($data['dataEdit']->toArray());
        return view('backend/student/student_regi/student_regi_edit',$data);
       
    }

    public function StudentRegiUpdate(Request $request, $student_id)
    {
        DB::transaction(function() use($request, $student_id) {
            
            
            
            
            $user = User::where('id',$student_id)->first();
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));

            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('upload/student_images/'.$user->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'),$filename);
                $user['image'] = $filename;
            }
            $user->save();

            
            $assignstudent = AssignStudent::where('id',$request->id)->where('student_id',$student_id)->first();
            
            $assignstudent->class_id = $request->class_id;
            $assignstudent->year_id = $request->year_id;
            $assignstudent->group_id = $request->group_id;
            $assignstudent->shift_id = $request->shift_id;
            $assignstudent->save();

            
            $discount_student = DiscountStudent::where('assign_student_id',$request->id)->first();
            $discount_student->discount = $request->discount;
            $discount_student->save();
            
        });

        $notification = array(
            'message' =>' Student Registration has been Updated Succesfully.',
            'alert-type'=>'success',
        );
        

        return redirect()->route('student/registration/view')->with($notification);

    }  // end method



    public function StudentPromotion($student_id)
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();

        $data['dataEdit'] = AssignStudent::with(['student_info','student_discount'])->where('student_id',$student_id)->first();
        
        return view('backend/student/student_regi/student_promotion',$data);
    }


    public function StudentPromotionStore(Request $request, $student_id)
    {
        DB::transaction(function() use($request, $student_id) {
            
            
            $user = User::where('id',$student_id)->first();
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));

            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('upload/student_images/'.$user->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'),$filename);
                $user['image'] = $filename;
            }
            $user->save();

            
            $assignstudent = new AssignStudent();
            
            $assignstudent->student_id = $student_id;
            $assignstudent->class_id = $request->class_id;
            $assignstudent->year_id = $request->year_id;
            $assignstudent->group_id = $request->group_id;
            $assignstudent->shift_id = $request->shift_id;
            $assignstudent->save();

            
            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assignstudent->id;
            $discount_student->fee_category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();
            
        });

        $notification = array(
            'message' =>' Student Promotion has been Completed Succesfully',
            'alert-type'=>'success',
        );
        

        return redirect()->route('student/registration/view')->with($notification);

    }  // end method


    public function StudentDetails($student_id)
    {
        $data['details'] = AssignStudent::with(['student_info','student_discount'])->where('student_id',$student_id)->first();

        $pdf = PDF::loadView('backend/student/student_regi/student_regi_detail_pdf', $data);
	$pdf->SetProtection(['copy', 'print'], '', 'pass');
	return $pdf->stream('document.pdf');
    

    }

    // function generate_pdf() {
    //     $data = [
    //         'foo' => 'bar'
    //     ];
    //     $pdf = PDF::loadView('pdf.document', $data);
    //     return $pdf->stream('document.pdf');
    // }

}
