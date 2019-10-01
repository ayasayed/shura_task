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



class profilecontroller extends Controller
{
    //add new  employee
    public function addNewEmp(Request $request){
        $flag=false;
         $this->validate($request,[
             'username'=>'required|min:3|max:32|unique:employees',
             'password'=>'required|min:6|unique:employees',
         ]
         ) ;

         $emp=new Employee();
         $emp->name=$request->input('name');
         $emp->username=$request->input('username');
         $emp->password=$request->input('password');
         $emp->title=$request->input('title');
         $emp->birth_date=$request->input('birth_date');
         $emp->no_of_childrens=$request->input('no_of_childrens');
         $emp->sub_id=$request->input('sub_id');
         $emp->save();
          $flag=true;
         return back()->with('e',"success!!");
        }
 ///////////

        public function delete($id){

             $employee=Employee::find($id);//->delete();
                 $childs=$employee->childs;
            // return back();
             if(count($employee->childs)>0){
                foreach($childs as $c ){
                    $c->sub_id=$employee->sub_id;
                    $c->save();
                 }
                 $employee->delete();
               }else{
                $employee->delete();
               }
             return back();
        }

        public function edit(Request $request,$id)
        {
            if($request->isMethod('post')){
                $this->validate($request,[
                    'username'=>'required|min:3|max:32|unique:employees',
                    'password'=>'required|min:6|unique:employees',
                ]
                ) ;
                    $emp=Employee::find($id);
                    $emp->name=$request->input('name');
                    $emp->username=$request->input('username');
                    $emp->password=$request->input('password');
                    $emp->title=$request->input('title');
                    $emp->birth_date=$request->input('birth_date');
                    $emp->no_of_childrens=$request->input('no_of_childrens');
                    $emp->sub_id=$request->input('sub_id');
                    $emp->save();
                    $info= $request->session()->get('info');
                    return redirect('successlogin/'.$info['username']);

              }
                else{
                    $employee=Employee::find($id);
                   return view('editEmp',['employee'=>$employee]);
                }
        }
}
