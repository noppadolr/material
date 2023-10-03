<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification=array();
        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'info'
        );

        return redirect('admin/login')->with($notification);
    }

    //End AdminLogout method
    public function authenticate(Request $request)
    {
        $validate = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);
        $user = User::query()->where('username', "=", $request->username)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                if(Auth::attempt($validate))
                {
                    $notification = array(
                        'message' => 'User Loin Successfully',
                        'alert-type' => 'success'
                    );
                    $request->session()->regenerate();
                    if ($user->role === 'admin') {
                        return redirect()->intended('admin/dashboard')->with('sucess', 'Log in success');
                    }elseif ($user->role === 'manager') {
                        return redirect()->intended('manager/dashboard')->with($notification);
                    }elseif ($user->role === 'user') {
                        return redirect()->intended('dashboard')->with($notification);
                    }


                }else
                {
                    return back()->with('error','LOGIN FAILED');
                }
            }else{
                return back()->with('pfail', 'Password is not match')
                    ->with('emaill', $request->email);
            }
        }else{
            return back()->with('efail', 'This Username ' . $request->email . ' is not Register');
        }


    }
    //    End AdminLoginView method


}
