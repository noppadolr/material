<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Validation\ValidatesRequests;
//use App\Rules\MatchOldPassword;

class AdminController extends Controller
{
    public function AdminloginView(){
        return \view('admin.login');
    }
    //end method

    public function AdminDashboard(){
        $id = Auth::user()->id;
        $adminData = User::query()->find($id);
        return view('admin.dashboard',compact('adminData'));
    }

    public function AdminProfile(){
        $id = Auth::user()->id;
        $adminData = User::query()->find($id);
        return view('admin.profile',compact('adminData'));
    }
}
