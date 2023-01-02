<?php

namespace App\Http\Controllers\Backend\student_setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use App\Models\FeeCategoryAmount;

class FeeAmountController extends Controller
{
    public function FeeAmountView()
    {   
        // $amount_data  = FeeCategoryAmount::all();
        $amount_data  = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
       return view('backend/setup/fee_amount/fee_amount_view',compact('amount_data'));
    }

    public function FeeAmountAdd()
    {
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend/setup/fee_amount/fee_amount_add',$data);
    }

    public function FeeAmountStore(Request $request)
    {
        
        $classCount = count($request->class_id);
        if($classCount != NULL){
            for ($i =0; $i < $classCount; $i++ ){
                
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();

            } // end for condition
        }// endif condition
        $notification = array(
            'message' =>'Fee Category has been Added Succesfully.',
            'alert-type'=>'success',
        );
        
        return redirect()->route('fee/amount/view')->with($notification);
        
    }

    

    public function FeeAmountEdit($fee_category_id)
    {
        // $fee_amount_edit = FeeCategory::find($fee_category_id);
        $data['editamount'] = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend/setup/fee_amount/fee_amount_edit',$data);
    }

    public function FeeAmountUpdate(Request $request,$fee_category_id)
    {

        if ($request->class_id == NULL) {
            $notification = array(
                'message' =>'Sorry, You can not change without any data.',
                'alert-type'=>'error',
            );
            
            return redirect()->route('fee/amount/edit',$fee_category_id)->with($notification);
        }else{
            $classCount = count($request->class_id);
            FeeCategoryAmount::where('fee_category_id',$fee_category_id)->delete();

            for ($i =0; $i < $classCount; $i++ ){
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();

            } // end for condition
        
        }
        $notification = array(
            'message' =>'Fee Amount has been Updated Succesfully.',
            'alert-type'=>'success',
        );

        return redirect()->route('fee/amount/view')->with($notification);

    }

    public function FeeAmountDelete($fee_category_id)
    {
        $deletedata = FeeCategoryAmount::find($fee_category_id)->where('fee_category_id',$fee_category_id)->delete();
        // FeeCategoryAmount::where('fee_category_id',$fee_category_id)->delete();
        $notification = array(
            'message' =>'Fee Amount has been Deleted Succesfully.',
            'alert-type'=>'success',
        );

        return redirect()->route('fee/amount/view')->with($notification);
    }

        public function FeeAmountDetails($fee_category_id)
        {
            $data['detailsamount'] = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
        
            return view('backend/setup/fee_amount/fee_amount_details',$data);
        }

}
