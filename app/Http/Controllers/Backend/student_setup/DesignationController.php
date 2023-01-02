<?php

namespace App\Http\Controllers\Backend\student_setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Designation;

class DesignationController extends Controller
{
    public function DesignationView()
    {   
        $view_designation  = Designation::all();
       return view('backend/setup/designation/designation_view',compact('view_designation'));
    }

    public function DesignationAdd ()
    {
        return view('backend/setup/designation/designation_add');
    }

    public function DesignationStore (Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:designations',
            
        ]);

        $data = new Designation();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' =>'Designation has been Added Succesfully.',
            'alert-type'=>'success',
        );
        return redirect()->route('designation/view')->with($notification);
    }


    public function DesignationEdit ($id)
    {
        $designation_edit = Designation::find($id);
        return view('backend/setup/designation/designation_edit',compact('designation_edit'));
    }

    public function DesignationUpdate(Request $request,$id)
    {
        $updatedata = Designation::find($id);
        $validated = $request->validate([
            'name' => 'required|unique:designations,name,'.$updatedata->id
            
        ]);
        $updatedata->name = $request->name;
        $updatedata->save();
        
        $notification = array(
            'message' =>'Designation has been Updated Succesfully.',
            'alert-type'=>'success',
        );
        return redirect()->route('designation/view')->with($notification);

    }

    public function DesignationDelete($id)
    {
        $deletedata = Designation::find($id)->delete();
        $notification = array(
            'message' =>'Designation has been Delete Succesfully.',
            'alert-type'=>'success',
        );
        return redirect()->route('designation/view')->with($notification);
    }



}
