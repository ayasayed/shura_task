<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Session\SessionManager;
use App\Employee;
use DB;
use Validator;
use Auth;

class logincontroller extends Controller
{
    //check if user have permission to log in website
    public function checklogin(Request $req){
        $this->validate($req,[  //validation for username and password
            'username'=>'required',
            'password'=>'required'
        ],
        [
            'username.required'=>' username is required...',
            'password.required'=>'password is required...'

        ]
        ) ;
          $username=$req->input('username');
           $password=$req->input('password');

         $checklogin=DB::table("employees")->where(['username'=>$username,'password'=>$password])->get();

         if(count($checklogin) > 0){
             //start session
            $req->session()->put('info',$req->input());
            $info= $req->session()->get('info');
            print_r($info['username']);
         if ($info['username']==$username){
            return redirect('successlogin/'.$username);//to go to profile page
         }else{
            return redirect('/');
         }


         }
              else{
                return back()->with('error','Faild to Login !!'); //to return back to login page if login field
          }

        }



   function successlogin($username){

$employees=Employee::where('sub_id', '=', 0)->get();
$allemployees=Employee::pluck('title','id')->all();

       return view('successlogin',compact('employees','allemployees'));

   }

    function logout(Request $req){
       $req->session()->flush();  //destroy session to logout and return back to login page
        return redirect("/");
    }
}

