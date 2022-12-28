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
}
