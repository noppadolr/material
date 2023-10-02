<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminloginView(){
        return \view('admin.login');
    }
    //end method
}
