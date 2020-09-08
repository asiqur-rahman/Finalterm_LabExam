<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
  function index(){
    return view('login.index');
  }

  function verify(Request $request){

      $data = DB::table('users')
                  ->where('username', $request->username)
                  ->where('password', $request->password)
                  ->get();

      if(count($data) > 0)
      {
        //if i want to save two value in session ???

            $request->session()->put('username', $request->username);

            if($data[0]->usertype == "admin")
            {
                $request->session()->put('usertype', "admin");
                $request->session()->put('userid', $data[0]->id);
                return redirect()->route('admin.index');
            }
            else if($data[0]->usertype == "manager")
            {
                $request->session()->put('type', "manager");
                $request->session()->put('userid', $data[0]->id);
                return redirect()->route('employee.index');
            }
      }
      else
      {
            $request->session()->flash('msg', 'invalid username/password');
            return redirect()->route('login');
        }
  }
}
