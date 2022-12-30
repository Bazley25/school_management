<?php

namespace App\Http\Controllers\Backend\student_setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    public function FeeCategoryView()
    {   
        $category_data  = FeeCategory::all();
       return view('backend/setup/fee_category/fee_category_view',compact('category_data'));
    }

    public function FeeCategoryAdd()
    {
        return view('backend/setup/fee_category/fee_category_add');
    }

    public function FeeCategoryStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:fee_categories',
            
        ]);

        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' =>'Fee Category has been Added Succesfully.',
            'alert-type'=>'success',
        );
        

        return redirect()->route('fee/category/view')->with($notification);
    }

    

    public function FeeCategoryEdit($id)
    {
        $fee_edit = FeeCategory::find($id);
        return view('backend/setup/fee_category/fee_category_edit',compact('fee_edit'));
    }

    public function FeeCategoryUpdate(Request $request,$id)
    {
        $updatedata = FeeCategory::find($id);
        $validated = $request->validate([
            'name' => 'required|unique:fee_categories,name,'.$updatedata->id
            
        ]);

        
        $updatedata->name = $request->name;
        $updatedata->save();
        
        $notification = array(
            'message' =>'Category has been Updated Succesfully.',
            'alert-type'=>'success',
        );
        

        return redirect()->route('fee/category/view')->with($notification);

    }

    public function FeeCategoryDelete($id)
    {
        $deletedata = FeeCategory::find($id)->delete();
        $notification = array(
            'message' =>'Fee Category has been Delete Succesfully.',
            'alert-type'=>'success',
        );

        return redirect()->route('fee/category/view')->with($notification);
    }

}
