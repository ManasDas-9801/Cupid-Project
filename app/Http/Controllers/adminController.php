<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function adminDashboard()
    {
        $data['all_users'] = User::get();
        return view('admindashboard',$data);
    }
}
