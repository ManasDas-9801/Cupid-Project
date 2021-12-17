<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $data['our_picks'] = User::where([['gender','!=',Auth::user()->gender],['occupation',Auth::user()->occupation]])->get();
       return view('home',$data);
    }

    public function prefrence(Request $req)
    {
        
        $data['ours_search'] = User::where([['gender',$req->gender],['family_type',$req->family_type],['mangalik',$req->mangalik]])->get();
          return view('oursearch',$data);
       
    }

    public function profile()
    {
        $data['user_profile'] = User::where('id',Auth::user()->id)->first();

        return view('editUser',$data);
    }
    public function update_profile(Request $req)
    {
        if(!empty($req->dob)){
            $user = User::find(Auth::user()->id);
            $user->name = $req->name;
            $user->email = $req->email;
            $user->l_name = $req->l_name;
            $user->dob = $req->dob;
            $user->gender = $req->gender;
            $user->anual_income = $req->anual_income;
            $user->occupation = $req->occupation;
            $user->family_type = $req->family_type;
            $user->mangalik = $req->mangalik;
           $user->save();

        }
        else{
            $user = User::find(Auth::user()->id);
            $user->name = $req->name;
            $user->email = $req->email;
            $user->l_name = $req->l_name;
            $user->dob = Auth::user()->dob;
            $user->gender = $req->gender;
            $user->anual_income = $req->anual_income;
            $user->occupation = $req->occupation;
            $user->family_type = $req->family_type;
            $user->mangalik = $req->mangalik;
           $user->save();
        }
        return redirect('/home')->with('message','Profile Updated Successfully');
    }
}
