<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function UserView()
    {
        $allUser = User::all();
        return view('backend/user/user_view',compact('allUser'));
    }

    public function UserAdd()
    {
        return view('backend/user/user_add');
    }

    public function UserStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'user_name' => 'required',
            'email' => 'required|unique:users',
        ]);

        $data = new User();
        $data->usertype = $request->usertype;
        $data->user_name = $request->user_name;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        $notification = array(
            'message' =>'User has been Added Succesfully.',
            'alert-type'=>'success',
        );
        

        return redirect()->route('user/view')->with($notification);
        
    }

    public function UserEdit ($id)
    {
        $edit_datas = User::find($id);
        return view('backend/user/user_edit',compact('edit_datas'));
    }

public function UserUpdate(Request $request, $id)
{
    $update = User::find($id);
    $update->usertype = $request->usertype;
    $update->user_name = $request->user_name;
    $update->name = $request->name;
    $update->email = $request->email;
    $update->save();

    $notification = array(
        'message' =>'User has been Updated Succesfully.',
        'alert-type'=>'success',
    );
    

    return redirect()->route('user/view')->with($notification);
}

public function UserDelete($id)
{
    $delete = User::find($id)->delete();

    $notification = array(
        'message' =>'User has been Deleted Succesfully.',
        'alert-type'=>'success',
    );
    return redirect()->route('user/view')->with($notification);
}


}
