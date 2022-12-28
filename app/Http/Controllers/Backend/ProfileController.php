<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;



class ProfileController extends Controller
{
    public function ProfileView()
    {
        $id = Auth::user()->id;
        
        $user = User::find($id);


       return view('backend/profile/profile_view',compact('user'));
    }

    public function ProfileEdit()
    {
        $id = Auth::user()->id;
        
        $editdata = User::find($id);


       return view('backend/profile/profile_edit',compact('editdata'));
    }


    public function ProfileUpdate(Request $request )
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->user_name = $request->user_name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;
        // $data->password = bcrypt($request->password);
    if($request->file('image')){
        $file = $request->file('image');
        @unlink(public_path('upload/user_images/'.$data->image));
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/user_images'),$filename);
        $data['image'] = $filename;
    }
    $data->save();

    $notification = array(
        'message' =>'User Profile has been Updated Succesfully.',
        'alert-type'=>'success',
    );
    
    return redirect()->route('view/profile')->with($notification);
    
    }

    public function PasswordView()
    {
        return view('backend/profile/edit_pass');
    }

    public function PasswordUpdate(Request $request)
    {
        $validated = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
            
        ]);

        $hashedPassword = Auth::user()->password;
    	if (Hash::check($request->oldpassword,$hashedPassword)) {
    		$user = User::find(Auth::id());
    		$user->password = Hash::make($request->password);
    		$user->save();
    		Auth::logout();
    		return redirect()->route('login');
    	}else{
    		return redirect()->back();
    	}

        // $hashedPassword = Auth::user()->password;
        // if (Hash::check($request->current_password,$hashedPassword)) {
        //     $user = User::find(Auth::id());
        //     $user->password = Hash::make($request->password);
        //     $user->save();
        //     Auth::logout();
        //     return redirect()->route('login');
        // }else{
        //     return redirect()->back();
        // }
    }

}
