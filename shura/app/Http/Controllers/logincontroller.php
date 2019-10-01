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
    //
    public function checklogin(Request $req){
        $this->validate($req,[
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
            $req->session()->put('info',$req->input());
            $info= $req->session()->get('info');
            print_r($info['username']);
         if ($info['username']==$username){
            return redirect('successlogin/'.$username);
         }else{
            return redirect('/');
         }


         }
              else{
                return back()->with('error','Faild to Login !!');
          }

        }



   function successlogin($username){

$employees=Employee::where('sub_id', '=', 0)->get();
$allemployees=Employee::pluck('title','id')->all();

       return view('successlogin',compact('employees','allemployees'));

   }

    function logout(Request $req){
       $req->session()->flush();
        return redirect("/");
    }
}

