<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
  function index2(Request $request){
    // $link=['Account'=>route('admin.index'),'User Report'=>route('admin.userReport'),'Product Report'=>'','Sell Request'=>'','Logout'=>'/logout'];
    // $link=['My Account'=>route('admin.index'),'Logout'=>'/logout'];
    // var navLinks=['/Account','/uReport','/pReport','/SellRequest','/Logout'];
    $label=array('Username','Password','Full Name','Address','Phone','Email','Loyality Point');
    $dbdata=array();
    $data = DB::table('users')
            ->where('usertype','=','employee')
            ->get();
    if(count($data) > 0)
    {
      array_push($dbdata,$data[0]->username);
      array_push($dbdata,$data[0]->password);
      array_push($dbdata,$data[0]->name);
      array_push($dbdata,$data[0]->companyname);
      array_push($dbdata,$data[0]->contactno);
    }
    return view('admin')->withlabel($label)
                        ->withdbdata($dbdata)
                        ->withtitle("| Admin");
  }
  function index(Request $request){
    $link=['Account'=>route('admin.index'),'User Report'=>'','Product Report'=>'','Sell Request'=>'','Logout'=>'/logout'];
    $thead=array('Username','Password','Name','Company Name','Contact No','Action','Action');
    $tLinkName=['Update','Delete'];
    $tLink=['/admin/update/employee/','/admin/delete/employee/'];

    $tdata=array();
    $data = DB::table('users')->where('usertype','=','employee')->get();
    // print_r(count((array)$data[0]));
    for($i=0; $i<count($data); $i++)
    {
      $row=array($data[$i]->username,$data[$i]->password,$data[$i]->name,$data[$i]->companyname,$data[$i]->contactno,$data[$i]->id);
      array_push($tdata,$row);
    }
    return view('employees')->withlink($link)
                        ->withmsg("All Users Information")
                        ->withthead($thead)
                        ->withtdata($tdata)
                        ->withtLinkName($tLinkName)
                        ->withtLink($tLink)
                        ->withtitle("Users Report | Admin");
  }
  function register(){
    return view('registeremployee');
  }
  function registeremployee(Request $request){
    $affected = DB::table('users')
              ->insert(['username' => $request->username,'password' => $request->password,'usertype' => 'employee','companyname' => $request->companyname,'contactno' => $request->contactno]);

    if($affected>0){
      //$request->session()->flash('status', 'Update successfully!');
      return redirect()->route('admin.index');
    }
    else{
      return redirect()->route('admin.index');
    }
  }

}
